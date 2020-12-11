@extends('Backend.Layout.master')
@section('title')
    Add Configuration
@endsection

@section('styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
<div>
    <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
        <div class="card ">
            <div class="card-body register-card-body">
                <div class="mb-4"><h4>Add Configuration</h4></div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{url('/save-config')}}">
                    @csrf
                    <div class="input-group mb-3">
                         Admin Email:
                        <input type="text" id="admin_email" name="admin_email" class="form-control ml-3 @error('admin_email') is-invalid @enderror" value="{{ old('admin_email') }}" autocomplete="admin_email" autofocus placeholder="Admin Email">
                            @error('admin_email')
                            <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        Notification Email:
                        <input type="text" id="notification_email" name="notification_email" class="form-control ml-3 @error('notification_email') is-invalid @enderror" value="{{ old('notification_email') }}" autocomplete="notification_email" autofocus placeholder="Notification Email">
                            @error('notification_email')
                            <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    </div>
                
                    <div class="row">
                        <!-- /.col -->
                        <div class="d-flex p-2">
                            <a href=""><button type="submit" class="btn btn-primary m-2 ml-5">Add Configuration</button></a>
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
