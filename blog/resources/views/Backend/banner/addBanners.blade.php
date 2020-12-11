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
                <form method="POST" enctype="multipart/form-data" action="{{url('/save-banners')}}">
                    @csrf
                    <div class="input-group mb-3">
                        Name:
                        <input type="text" id="banner_name" name="banner_name" class="form-control ml-3 @error('banner_name') is-invalid @enderror" value="{{ old('banner_name') }}" autocomplete="banner_name" autofocus placeholder="Banner Name">
                            @error('banner_name')
                            <span class="invalid-feedback " style="margin-left: 60px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        Text Style:
                        <input type="text" id="text_style" name="text_style" class="form-control ml-3 @error('text_style') is-invalid @enderror" value="{{ old('text_style') }}" autocomplete="text_style" autofocus placeholder="Text Style">
                            @error('text_style')
                            <span class="invalid-feedback " style="margin-left: 80px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        Content:
                         <textarea type="text" id="content" class="form-control ml-3 @error('content') is-invalid @enderror" value="{{ old('content') }}" autocomplete="content" name="content"  autocomplete="content" autofocus></textarea>
                            @error('content')
                            <span class="invalid-feedback " style="margin-left: 70px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        Link:
                        <input type="text" id="link" name="link" class="form-control ml-3 @error('link') is-invalid @enderror" value="{{ old('link') }}" autocomplete="link" autofocus placeholder="Link">
                            @error('link')
                            <span class="invalid-feedback " style="margin-left: 50px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        Sort Order:
                        <input type="text" id="sort_order" name="sort_order" class="form-control ml-3 @error('sort_order') is-invalid @enderror" value="{{ old('sort_order') }}" autocomplete="sort_order" autofocus placeholder="Sort Order">
                            @error('sort_order')
                            <span class="invalid-feedback " style="margin-left: 90px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        Banner Image:
                        <input type="file" id="image" class="ml-3" name="image" accept="image/*" required>
                         @error('sort_order')
                            <span class="invalid-feedback " style="margin-left: 60px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
