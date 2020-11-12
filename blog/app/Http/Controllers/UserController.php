<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsAttributes;
Use Illuminate\Support\Facades\Session;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use MongoDB\Driver\Session;

class UserController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status','1')->orderby('sort_order','asc')->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Product::get();
        $featureProducts = Product::where('feature_status','1')->get();
        return view('Frontend.index')->with(compact('banners','categories','products','featureProducts'));
    }
    public function product(){
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Product::get();

        return view('Frontend.products')->with(compact('products','categories'));
    }
    public function productDetail($id){
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
       // $productDetail = Product::with('attributes')->where('id',$id)->get();
        $products = Product::where('id',$id)->first();
        //echo "<pre>";print_r($products);die;
        return view('Frontend.productDetail')->with(compact('products','categories'));
    }
    public function userLoginRegister(){
        return view ('Frontend.auth.login_register');
    }
    public function register(Request $request){
        if ($request->isMethod('post')){
            $data = $request->all();
           // echo "<pre>";print_r($data);die;
            $userCount= User::where('email',$data['email'])->count();
            if($userCount>0){
                return redirect()->back()->with('status','Email is already registered');
            }
            else{
               // echo "success";die;
                $user = new User;
                $user->first_name=$data['first_name'];
                $user->last_name = $data['last_name'];
                $user->email = $data['email'];
                $user->password = Hash::make($data['password']);
                $user->save();
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                   Session::put('frontSession',$data['email']);
                    return redirect('/cart');
                }
            }
        }
    }
    public function logout(Request $request){
        Session::forget('frontSession');
        Auth::logout();
        return redirect('/customer');
    }
    public function login(Request $request){
        if ($request->isMethod('post')){
            $data = $request->all();
          //  echo "<pre>";print_r($data);die;
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
             Session::put('frontSession',$data['email']);
                return redirect('/cart');
            }
            else{
                return redirect()->back()->with('status','Invalid Password or Email Address');
            }
        }
    }
    public function account(Request $request){
        return view('Frontend.users.account');
    }
    public function cart(Request $request){
        return view('Frontend.cart');
    }
}
