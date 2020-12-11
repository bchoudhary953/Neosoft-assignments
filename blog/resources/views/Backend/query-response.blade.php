@extends('Backend.Layout.master')
@section('title')
    Query Response
@endsection

@section('styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div>
        <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
            <div class="card ">
                <div class="card-body register-card-body">
                    <div class="mb-4"><h4>Edit Product</h4></div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{url('/query-response/'.$messages->id)}}">
                        @csrf
                        <div class="input-group mb-3">
                            Name:
                            <input type="hidden" id="product_name" class="form-control ml-3" name="product_name" value="{{$messages->name}}" required autocomplete="product_name" autofocus>
                            {{$messages->name}}
                        </div>
                        <div class="input-group mb-3">
                            Email :
                            <input type="hidden" id="code" class="form-control ml-3" name="code" value="{{$messages->email}}" required autocomplete="code" autofocus>
                            {{$messages->email}}
                        </div>
                        <div class="input-group mb-3">
                            Message:
                            <input type="hidden" id="color" class="form-control ml-3" name="color" value="{{$messages->message}}" required autocomplete="color" autofocus>
                            {{$messages->message}}
                        </div>
                        <div class="input-group mb-3">
                            Subject:
                            <input type="hidden" id="price" class="form-control ml-3" name="price" value="{{$messages->subject}}" required autocomplete="price" autofocus >
                            {{$messages->subject}}
                        </div>
                        <div class="input-group mb-3">
                            Response:
                            <textarea type="text" id="response" class="form-control ml-3" name="response" required autocomplete="response" autofocus></textarea>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="d-flex p-2">
                                <a href=""><button type="submit" class="btn btn-primary m-2">Response Save</button></a>
                                <a href="/admin/contact-us" class="btn btn-danger m-2">Cancel</a>
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



