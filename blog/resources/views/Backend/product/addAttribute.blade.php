@extends('Backend.Layout.master')
@section('title')
     Product Attributes
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('Backend/css//dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('Backend/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
<div>
    <div class="register-box justify-content-center w-100">
        <div class="card ">
            <div class="card-body register-card-body">
                <div class="mb-4"><h4>Product Attributes</h4></div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{url('/admin/add-attribute/'.$product->id)}}">
                    @csrf
                    <div class="input-group mb-3">
                        Product Name:{{$product->name}}
                    </div>
                    <div class="input-group mb-3">
                        Product Code:{{$product->code}}
                    </div>
                    <div class="input-group mb-3">
                        Product Color:{{$product->color}}
                    </div>
                    <div>
                        <div class="field_wrapper">
                            <div class="d-flex">
                                <input type="text" name="sku[]" id="sku[]" style="width: 120px;" placeholder="SKU" CLASS="form-control mr-2" value=""/>
                                <input type="text" name="size[]" id="size[]" style="width: 120px;" placeholder="SIZE" CLASS="form-control mr-2" value=""/>
                                <input type="text" name="price[]" id="price[]" style="width: 120px;" placeholder="PRICE" CLASS="form-control mr-2" value=""/>
                                <input type="text" name="stock[]" id="stock[]" style="width: 120px;" placeholder="STOCK" CLASS="form-control" value=""/>
                                <a href="javascript:void(0);" class="add_button" title="Add Field">Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="d-flex p-2">
                            <a href=""><button type="submit" class="btn btn-primary mt-2">Add Attribute</button></a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">View Product</h3>
                </div>
                <!-- /.card-header -->
                <div><a class="btn btn-primary ml-3 p-1" style=" width:140px;" href="{{url('/admin/add-product')}}"><i class="fa fa-plus"></i> Add Product</a></div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{url('/admin/edit-attribute/'.$product->id)}}">
                        @csrf
                        <table id="example1" style="" class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>SKU</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th class="align-content-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product['attributes'] as $attribute)
                            <tr>
                                <td><input style="display: none; width: 100px;text-align: center" type="hidden" name="attr[]" value="{{$attribute->id}}">{{$attribute->id}}</td>
                                <td><input style="width: 150px;text-align: center" type="text" name="sku[]" value="{{$attribute->sku}}"></td>
                                <td><input style="width: 150px;text-align: center" type="text" name="size[]" value="{{$attribute->size}}"></td>
                                <td><input style="width: 150px;text-align: center" type="text" name="price[]" value="{{$attribute->price}}"></td>
                                <td><input style="width: 150px;text-align: center" type="text" name="stock[]" value="{{$attribute->stock}}"></td>
                                <td> <input type="submit" value="update" class="btn btn-success">
                                     <a href="/admin/delete-attribute/{{$attribute->id}}"><button class="btn btn-danger" ><i class="fas fa-trash"></i></button></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('Backend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Backend/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('Backend/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('Backend/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
