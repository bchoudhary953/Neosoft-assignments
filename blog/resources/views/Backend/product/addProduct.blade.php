@extends('Backend.Layout.master')
@section('title')
    Add Product
@endsection

@section('styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
<div>
    <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
        <div class="card ">
            <div class="card-body register-card-body">
                <div class="mb-4"><h4>Add Product</h4></div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{url('/admin/save-product')}}">
                    @csrf
                    <div class="input-group mb-3">
                        Under Category:
                        <select name="category_id" id="category_id" class="form-control ml-3">
                            <?php echo $categories_dropdown;?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        Product Name:
                        <input type="text" id="product_name" name="product_name" class="form-control ml-3 @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" autocomplete="product_name" autofocus placeholder="Product Name">
                            @error('product_name')
                            <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        Product Code:
                        <input type="text" id="code" name="code" class="form-control ml-3 @error('code') is-invalid @enderror" value="{{ old('code') }}" autocomplete="code" autofocus placeholder="Product Code">
                            @error('code')
                            <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        Product Color:
                        <input type="text" id="color" name="color" class="form-control ml-3 @error('color') is-invalid @enderror" value="{{ old('color') }}" autocomplete="color" autofocus placeholder="Product Color">
                            @error('color')
                            <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                            Product Description:
                            <textarea type="text" id="description" class="form-control ml-3 @error('description') is-invalid @enderror" name="description"  autocomplete="description" autofocus>{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    <div class="input-group mb-3">
                        Product Price:
                        <input type="text" id="price" name="price" class="form-control ml-3 @error('price') is-invalid @enderror" value="{{ old('price') }}" autocomplete="price" autofocus placeholder="Price">
                            @error('price')
                            <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="input-group mb-3">
                        Product Image:
                        
                        <input type="file" id="image" name="image" class="form-control ml-3 @error('image') is-invalid @enderror" value="{{ old('image') }}"  accept="image/*" autofocus>
                            @error('image')
                            <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="d-flex p-2">
                            <a href=""><button type="submit" class="btn btn-primary m-2 ml-5">Add Product</button></a>
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
