@extends('Backend.Layout.master')
@section('title')
    Add User
@endsection

@section('styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
<div >
    <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
        <div class="card ">
            <div class="card-body register-card-body">
                <div class="mb-4"><h4>Add User</h4></div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{url('/save-user')}}">
                    @csrf
                    <div class="input-group mb-3">
                        First Name:
                        <input type="text" id="first_name" name="first_name" class="form-control ml-3 @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" autocomplete="first_name" autofocus placeholder="First Name">
                            @error('first_name')
                            <span class="invalid-feedback " style="margin-left: 100px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        Last Name:
                        <input type="text" id="last_name" name="last_name" class="form-control ml-3 @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" autocomplete="first_name" autofocus placeholder="Last Name">
                            @error('last_name')
                            <span class="invalid-feedback " style="margin-left: 100px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="input-group mb-3">
                        Email:
                        <input type="email" id="email" name="email" class="form-control ml-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback " style="margin-left: 70px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        Password:
                        <input type="password" id="password" name="password" class="form-control ml-3 @error('password') is-invalid @enderror" value="{{ old('password') }}" autocomplete="password" autofocus placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback " style="margin-left: 100px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        Role Type: 
                        <select class="form-control ml-3" name="role" style="width: 550px">
                            @foreach($role_array as $data)
                            <option value="{{$data->name}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                        @error('user_type')
                            <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="d-flex p-2">
                            <a href=""><button type="submit" class="btn btn-primary m-2 ml-5">Add User</button></a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('Backend/js/Chart.min.js')}}"></script>
    <script src="{{asset('Backend/js/dashboard2.js')}}"></script>
    <script src="{{asset('Backend/js/adminlte.js')}}"></script>
    <script src="{{asset('Backend/js/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('Backend/js/usa_states.min.js')}}"></script>

@endsection
