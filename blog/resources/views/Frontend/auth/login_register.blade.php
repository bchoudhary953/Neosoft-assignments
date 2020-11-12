@extends('Frontend.Layout.master')
@section('title')
    Login-Register
@endsection

@section('styles')
@endsection

@section('content')
    <div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <section id="slider">

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
            <div class="login-form"><!--login form-->
                <h2>Login to your account</h2>
                <form action="/user-login" method="post">
                    @csrf
                    <input type="email" id="email" name="email" placeholder="Email Address" />
                    <input type="password" id="password" name="password" placeholder="Password" />
                    <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
                    </span>
                    <button type="submit" class="btn btn-default">Login</button>
                    @if (Route::has('password.request'))
                        <p class="mb-1">
                            <a href="{{ url('/forgot_password') }}" class="btn btn-primary">I forgot my password</a>
                        </p>
                    @endif
                </form>
                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="login/facebook" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="{{ url('auth/google') }}" class="btn btn-block btn-danger">
                        <i class="fab fa-google mr-2"></i> Sign in using Google
                    </a>
                </div>
            </div><!--/login form-->
        </div>
        <div class="col-sm-1">
            <h2 class="or">OR</h2>
        </div>
        <div class="col-sm-4">
            <div class="signup-form"><!--sign up form-->
                <h2>New User Signup!</h2>
                <form action="{{url('/user-register')}}" method="POST">
                    @csrf
                    <input type="text" name="first_name" id="first_name" placeholder="First Name"/>
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name"/>
                    <input type="email" name="email" id="email" placeholder="Email Address"/>
                    <input type="password" name="password" id="password" placeholder="Password"/>
                    <button type="submit" class="btn btn-default">Signup</button>
                </form>
                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="login/facebook" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="{{ url('auth/google') }}" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google
                    </a>
                </div>
            </div><!--/sign up form-->
        </div>
    </div>
</div>
</section>
</div>
@endsection
@section('scripts')
@endsection
