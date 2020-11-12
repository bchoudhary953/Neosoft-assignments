@extends('Backend.Layout.master')
@section('title')
    Add Category
@endsection

@section('styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
<div >
    <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
        <div class="card ">
            <div class="card-body register-card-body">
                <div class="mb-4"><h4>Add Category</h4></div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{url('/admin/add-category')}}">
                    @csrf
                    <div class="input-group mb-3">
                        Category Name:
                        <input type="text" id="category_name" class="form-control ml-3" name="category_name"  required autocomplete="category_name" autofocus placeholder="Category Name">
                    </div>
                    <div class="input-group mb-3">
                        Parent Category:
                        <select id="parent_id" name="parent_id" class="form-control ml-3" style="width: 410px">
                            <option value="0">Parent Category</option>
                            @foreach($levels as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        URL:
                        <input type="text" id="url" class="form-control ml-3" name="url" required autocomplete="url" autofocus placeholder="URL">
                    </div>
                    <div class="input-group mb-3">
                        Description:
                        <textarea type="text" id="description" class="form-control ml-3" name="description" required autocomplete="description" autofocus></textarea>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="d-flex p-2">
                            <a href=""><button type="submit" class="btn btn-primary m-2 ml-5">Add Category</button></a>
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
