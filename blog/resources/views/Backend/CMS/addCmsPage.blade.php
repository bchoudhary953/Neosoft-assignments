@extends('Backend.Layout.master')
@section('title')
    Add CMS Page
@endsection

@section('styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div>
        <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
            <div class="card ">
                <div class="card-body register-card-body">
                    <div class="mb-4"><h4>Add CMS Page</h4></div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{url('/admin/save-cms-page')}}">
                        @csrf
                        <div class="input-group mb-3">
                            Title:
                            <input type="text" id="title" name="category_name" class="form-control ml-3 @error('title') is-invalid @enderror" value="{{ old('title') }}" autocomplete="title" autofocus placeholder="Title">
                            @error('title')
                            <span class="invalid-feedback " style="margin-left: 60px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="input-group mb-3">
                            URL:
                            <input type="text" id="url" name="url" class="form-control ml-3 @error('url') is-invalid @enderror" value="{{ old('url') }}" autocomplete="url" autofocus placeholder="URL">
                            @error('url')
                            <span class="invalid-feedback " style="margin-left: 60px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            Description:
                            <textarea type="text" id="description" class="form-control ml-3 @error('description') is-invalid @enderror" autocomplete="description" name="description" autofocus>{{ old('description') }} </textarea>
                            @error('description')
                            <span class="invalid-feedback " style="margin-left: 100px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="d-flex p-2">
                                <a href=""><button type="submit" class="btn btn-primary m-2 ml-5">Add CMS Page</button></a>
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

