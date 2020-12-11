@extends('Backend.Layout.master')
@section('title')
    Edit User Role
@endsection

@section('styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
<div>
        <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
             <div class="card ">
                <div class="card-body register-card-body">
                    <div class="mb-4"><h4>Edit role of registered user</h4></div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <form method="POST" action="/role-register-update/{{$users->id}}">
                        @csrf
                         @method('PUT')
                        <div class="input-group mb-3">
                            <input type="text" id="first_name" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{$users->first_name}}" required autocomplete="name" autofocus placeholder="First name">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" id="last_name" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{$users->last_name }}" required autocomplete="name" autofocus placeholder="Last name">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-1 border ">
                            <!-- radio -->
                            <div class="form-group p-2" >
                                Status:
                                <div class="form-check">
                                    <input class="form-check-input" value="1" type="radio" name="status" checked>
                                    <label class="form-check-label">Active</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="0" type="radio" name="status">
                                    <label class="form-check-label">Inactive</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <!-- select -->
                            <div class="form-group">
                                <label>Select</label>
                                <select class="form-control" name="role" style="width: 550px">
                                    @foreach($role_array as $data)
                                    <option value="{{$data->name}}" @if($data->name==$users->user_type) selected @endif>{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="d-flex p-2">
                                <a href=""><button type="submit" class="btn btn-primary m-2">Update</button></a>
                                <a href="/user_management" class="btn btn-danger m-2">Cancel</a>
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
