@extends('Backend.Layout.master')
@section('title')
    Edit Product
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
                <form method="POST" enctype="multipart/form-data" action="{{url('/admin/edit-product/'.$product->id)}}">
                    @csrf
                    <div class="input-group mb-3">
                        Under Category:
                        <select name="category_id" id="category_id" class="form-control">
                        <?php echo $categories_dropdown; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        Product Name:
                        <input type="text" id="product_name" class="form-control ml-3" name="product_name" value="{{$product->name}}" required autocomplete="product_name" autofocus>
                    </div>
                    <div class="input-group mb-3">
                        Product Code:
                        <input type="text" id="code" class="form-control ml-3" name="code" value="{{$product->code}}" required autocomplete="code" autofocus>
                    </div>
                    <div class="input-group mb-3">
                        Product Color:
                        <input type="text" id="color" class="form-control ml-3" name="color" value="{{$product->color}}" required autocomplete="color" autofocus>
                    </div>
                    <div class="input-group mb-3">
                        Product Description:
                        <textarea type="text" id="description" class="form-control ml-3" name="description" required autocomplete="description" autofocus>{{$product->description}}</textarea>
                    </div>
                    <div class="input-group mb-3">
                        Product Price:
                        <input type="text" id="price" class="form-control ml-3" name="price" value="{{$product->price}}" required autocomplete="price" autofocus >
                    </div>
                    <div class="input-group mb-3">
                        Product Image:
                        <input type="file" name="image">
                        @if(!empty($product_image->image))
                            <input type="hidden" class="ml-3" name="current_image" value="{{$product_image->image}}" accept="image/*">
                            <img src="{{asset('/upload/product/'.$product_image->image)}}" style="width: 250px; padding: 20px;">
                        @endif
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="d-flex p-2">
                            <a href=""><button type="submit" class="btn btn-primary m-2">Update</button></a>
                            <a href="/admin/view-products" class="btn btn-danger m-2">Cancel</a>
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



