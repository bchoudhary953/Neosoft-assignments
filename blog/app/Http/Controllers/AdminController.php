<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('Backend.dashboard');
    }
    public function login(Request $request){
        if ($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'user_type'=>'admin'])){
                return redirect('Backend.dashboard');
            }
            else{
                return redirect('Backend.login')->with('status','Error');
            }
        }
        return view('Backend.login');
    }

}
