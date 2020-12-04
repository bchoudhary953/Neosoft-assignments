@extends('Layout.master')
@section('title')
    Edit User
@endsection

@section('styles')
@endsection

@section('content')
	 <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
        <div class="card ">
            <div class="card-body register-card-body">
                <div class="mb-4"><h4>Edit User</h4></div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{url('/edit-user/'.$user->id)}}">
                    @csrf
                    <div class="input-group mb-3">
                        First Name:
                        <input type="text" id="first_name" class="form-control ml-3" name="first_name" value="{{$user->first_name}}" required autocomplete="first_name" autofocus>
                    </div>
                     <div class="input-group mb-3">
                        Last Name:
                        <input type="text" id="last_name" class="form-control ml-3" name="last_name" value="{{$user->last_name}}" required autocomplete="last_name" autofocus>
                    </div>
                    <div class="input-group mb-3">
                        Email:
                        <input type="text" id="email" class="form-control ml-3" name="email" value="{{$user->email}}" required autocomplete="email" autofocus>
                    </div>
                    
                    <div class="input-group mb-3">
                        Mobile Number:
                        <input type="text" id="mobile_no" class="form-control ml-3" name="mobile_no" required autocomplete="mobile_no" autofocus value="{{$user->mobile_no}}">
                    </div>
                    <div class="input-group mb-3">
                        City:
                        <input type="text" id="city" class="form-control ml-3" name="city" required autocomplete="city" value="{{$user->city}}"autofocus >
                    </div>
                    <div class="input-group mb-3">
                        Gender:
                        <input type="text" id="gender" class="form-control ml-3" name="gender" required autocomplete="gender" value="{{$user->gender}}"autofocus >
                    </div>
                    <div class="input-group mb-3">
                        Profile Photo:
                        <input type="file" name="image">
                        @if(!empty($banner->image))
                        <input type="hidden" class="ml-3" name="current_image" value="{{$banner->image}}" accept="image/*">
                        <img src="{{asset('upload/banner/'.$banner->image)}}" style="width: 250px; padding: 20px;">
                        @endif
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="d-flex p-2">
                            <a href=""><button type="submit" class="btn btn-primary m-2">Update</button></a>
                            <a href="/view-users" class="btn btn-danger m-2">Cancel</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection

@section('scripts')
    <script src="{{asset('Backend/js/Chart.min.js')}}"></script>
    <script src="{{asset('Backend/js/dashboard2.js')}}"></script>
    <script src="{{asset('Backend/js/adminlte.js')}}"></script>
    <script src="{{asset('Backend/js/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('Backend/js/usa_states.min.js')}}"></script>

@endsection
