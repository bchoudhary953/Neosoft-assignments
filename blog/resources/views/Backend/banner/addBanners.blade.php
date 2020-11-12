@extends('Backend.Layout.master')
@section('title')
    Add Banner
@endsection

@section('styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
<div>
    <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
        <div class="card ">
            <div class="card-body register-card-body">
                <div class="mb-4"><h4>Add Banner</h4></div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{url('/add-banners')}}">
                    @csrf
                    <div class="input-group mb-3">
                        Name:
                        <input type="text" id="banner_name" class="form-control ml-3" name="banner_name"  required autocomplete="banner_name" autofocus placeholder="Banner Name">
                    </div>
                    <div class="input-group mb-3">
                        Text Style:
                        <input type="text" id="text_style" class="form-control ml-3" name="text_style" required autocomplete="text_style" autofocus placeholder="Text Style">
                    </div>
                    <div class="input-group mb-3">
                        Content:
                        <textarea type="text" id="content" class="form-control ml-3" name="content" required autocomplete="content" autofocus></textarea>
                    </div>
                    <div class="input-group mb-3">
                        Link:
                        <input type="text" id="link" class="form-control ml-3" name="link" required autocomplete="link" autofocus placeholder="Link">
                    </div>
                    <div class="input-group mb-3">
                        Sort Order:
                        <input type="text" id="sort_order" class="form-control ml-3" name="sort_order" required autocomplete="sort_order" autofocus placeholder="Sort Order">
                    </div>
                    <div class="input-group mb-3">
                        Banner Image:
                        <input type="file" id="image" class="ml-3" name="image" accept="image/*" required>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="d-flex p-2">
                            <a href=""><button type="submit" class="btn btn-primary m-2 ml-5">Add Banner</button></a>
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
