@extends('Backend.Layout.master')
@section('title')
    Edit CMS page
@endsection

@section('styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div>
        <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
            <div class="card ">
                <div class="card-body register-card-body">
                    <div class="mb-4"><h4>Edit Category</h4></div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{url('/admin/edit-cms-page/'.$cms->id)}}">
                        @csrf
                        <div class="input-group mb-3">
                            Title:
                            <input type="text" id="title" class="form-control ml-3" name="title" value="{{$cms->title}}" required autocomplete="title" autofocus >
                        </div>
                        <div class="input-group mb-3">
                            CMS Page URL:
                            <input type="text" id="url" class="form-control ml-3" name="url" value="{{$cms->url}}" required autocomplete="url" autofocus>
                        </div>
                        <div class="input-group mb-3">
                            Description:
                            <textarea type="text" id="description" class="form-control ml-3" name="description" required autocomplete="description" autofocus>{{$cms->description}}</textarea>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="d-flex p-2">
                                <a href=""><button type="submit" class="btn btn-primary m-2">Update</button></a>
                                <a href="/admin/view-cms-pages" class="btn btn-danger m-2">Cancel</a>
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



