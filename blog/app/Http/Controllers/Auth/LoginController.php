<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

   // protected $redirectTo ='/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        //dd($user);
         $finduser = User::where('email','ckhushboo38@gmail.com')->first();
           // dd($finduser);
        if($finduser){

            Auth::login($finduser,true);
            Session::put('frontSession','ckhushboo38@gmail.com');
            return redirect('/cart');

        }else{
            $user = User::firstOrCreate([
                'first_name'=>$user->getName(),
                'email'=>'ckhushboo38@gmail.com',
                'provider_id'=>$user->getId(),
            ]);
            Auth::login($user, true);
            Session::put('frontSession','ckhushboo38@gmail.com');
            return redirect('/cart');
        }
    }
    public function showLoginForm()
    {
       // return redirect('/admin');
        return view('customAuth.newLogin');
    }
}
