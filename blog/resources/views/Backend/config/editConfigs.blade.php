@extends('Backend.Layout.master')
@section('title')
    Edit Configuration
@endsection

@section('styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->

    <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
        <div class="card ">
            <div class="card-body register-card-body">
                <div class="mb-4"><h4>Edit Configuration</h4></div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{url('/edit-config/'.$config->id)}}">
                    @csrf
                    <div class="input-group mb-3">
                        Admin Email:
                        <input type="text" id="admin_email" class="form-control ml-3" name="admin_email" value="{{$config->admin_email}}" required autocomplete="admin_email" autofocus >
                    </div>
                    <div class="input-group mb-3">
                        Notification Email:
                        <input type="text" id="notification_email" class="form-control ml-3" name="notification_email" value="{{$config->notification_email}}" required autocomplete="notification_email" autofocus >
                    </div>
                    
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="d-flex p-2">
                            <a href=""><button type="submit" class="btn btn-primary m-2">Update</button></a>
                            <a href="/config_management" class="btn btn-danger m-2">Cancel</a>
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
