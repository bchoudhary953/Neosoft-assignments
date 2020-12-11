<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\config;
use App\Models\contactUs;
use App\Models\country;
use App\Models\Product;
use App\Models\ProductsAttributes;
use Illuminate\Support\Facades\Mail;
Use Illuminate\Support\Facades\Session;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use MongoDB\Driver\Session;

class UserController extends Controller
{
    public function index(){
        $banners = Banner::where('status','1')->orderby('sort_order','asc')->get();
        $categories = Category::with('categories')->where(['parent_id'=>0,'status'=>1])->get();
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
        $products = Product::with('attributes')->where('id',$id)->first();
        $products = json_decode(json_encode($products));

      //  echo "<pre>";print_r($products);die;
        return view('Frontend.productDetail')->with(compact('products','categories'));
    }
    public function getProductPrice(Request $request){
        $data = $request->all();
       // echo "<pre>";print_r($data);die;
        $proArr = explode("-", $data['idSize']);
        //echo $proArr[0]; echo $proArr[1];die;
        $proAttr = ProductsAttributes::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
        echo $proAttr->price;
    }
    public function userLoginRegister(){
        if(Auth::check())
            return redirect()->back()->with('status','You are already logged in!!!');
        return view ('Frontend.auth.login_register');
    }
    public function myAccount(){
        $user_id = Auth::user()->id;
        $user_detail = User::where('id',$user_id)->first();
        $countries = country::get();
        return view ('Frontend.users.myAccount')->with(compact('user_detail','countries'));
    }
    public function changeDetail(Request $request,$id){
        if ($request->isMethod('post')) {
            $data = $request->all();
           // echo "<pre>";print_r($data);die;
            User::where('id',$id)->update([
                'first_name'=>$data['first_name'],
                'last_name'=>$data['last_name'],
                'address1'=>$data['address1'],
                'address2'=>$data['address2'],
                'pin_code'=>$data['pin_code'],
                'state'=>$data['state'],
                'country'=>$data['country'],
                'mobile'=>$data['mobile_no'],
                'email'=>$data['email'],
            ]);
            return redirect()->back()->with('status','Details has been updated');
        }
    }
    public function changePassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $old_password = User::where('id', Auth::user()->id)->first();
            $current_password = $data['current_password'];
            if (Hash::check($current_password, $old_password->password)){
                $new_pwd = bcrypt($data['new_password']);
                User::where('id',Auth::user()->id)->update(['password'=>$new_pwd]);
                return redirect()->back()->with('status', 'password is changed successfully');
            }
            else{
                return redirect()->back()->with('status', 'password is not changed');
            }
        }
        return view('Frontend.users.changePassword');
    }
    public function contactUs(Request $request){
        if ($request->isMethod('post')){
            $data = $request->all();
            $user_id = Auth::user()->id;
            $user= new contactUs;
            $user->user_id = $user_id;
            $user->name = $data['name'];
            $user->subject = $data['subject'];
            $user->message = $data['message'];
            $user->email = $data['email'];
            $user->save();
            $email = $data['email'];
            $messageData = [
                'email'=>$email,
                'user'=>$user,
            ];
            $admin =  config::first();
            $email1 = $admin->notification_email;
            Mail::send('emails.contact-us',$messageData,function ($message) use ($email1){
                $message->to($email1)->subject('Contact-Us Form - E-commerce Website');
            });
            return redirect()->back()->with('status','Query has been submitted');
        }
        return view('Frontend.contact-us');
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
                $email = $data['email'];
                $messageData = [
                    'email'=>$email,
                    'name'=>$data['first_name'],
                ];
                Mail::send('emails.register',$messageData,function ($message) use ($email){
                    $message->to($email)->subject('Registration with - E-commerce Website');
                });
                $admin =  config::first();
                $email1 = $admin->notification_email;
            
               // $admin = User::where('user_type','admin')->first();
               
               // $email1 = $admin->email;
                Mail::send('emails.register',$messageData,function ($message) use ($email1){
                    $message->to($email1)->subject('Registration with - E-commerce Website');
                });
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
    public function confirmAccount($email){
        $email = base64_decode($email);
        $userCount = User::where('email',$email)->count();
        if ($userCount>0){
            $userDetails = User::where('email',$email)->first();
            if($userDetails->status == 1){
                return redirect('login-registration')->with("status",'Your email account is already activated. You can login now');
            }else{
                User::where('email',$email)->update(['status'=>1]);
                $messageData = [
                    'email'=>$email,
                    'name'=>$userDetails->first_name,
                ];
                Mail::send('emails.welcome',$messageData,function ($message) use ($email){
                    $message->to($email)->subject('Registration with - E-commerce Website');
                });

                return  redirect('login-registration')->with('status','Your email account is activated. You can login now.');
            }
        }
        else{
            return view('Frontend.404');
        }
    }
}
