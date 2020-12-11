@extends('Frontend.Layout.master')
@section('title')
    Change Password
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
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="login-form"><!--login form-->
                            <h2>Change Password</h2>
                            <form action="/change-password" method="post">
                                @csrf
                                <input type="hidden" id="current_password" name="current_password" placeholder="Current Password" />
                                <input type="password" id="current_password" name="current_password" placeholder="Current Password" />
                                <input type="password" id="new_password" name="new_password" placeholder="New Password" />
                                <button type="submit" class="btn btn-default">Save</button>
                            </form>
                        </div><!--/login form-->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
