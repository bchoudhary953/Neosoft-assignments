@extends('Backend.Layout.master')
@section('title')
    Product Management
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('Backend/css//dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('Backend/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3 class="card-title">Product Management</h3>
                </div>
                <!-- /.card-header -->
                <div id="message_success" style="display: none;" class="alert alert-success">Status Enabled</div>
                <div id="message_error" style="display: none;" class="alert alert-danger">Status Disabled</div>

                <div><a class="btn btn-primary m-3 p-1" style=" width:140px;" href="{{url('/admin/add-product')}}"><i class="fa fa-plus"></i> Add Product</a></div>
                <div class="card-body table-responsive">
                    <table class="table table-head-fixed text-nowrap" id="example1" style="width: 950px;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Feature</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $s1=1;
                        @endphp
                        @foreach($product as $row2)
                            <tr>
                                <td>{{$s1++}}</td>
                                <td>{{$row2->name}}</td>
                                <td><img src="{{asset('/upload/product/'.$row2->image)}}" alt="image" style="width: 150px;"></td>
                                <td>{{$row2->price}}</td>
                                <td>
                                    <input type="checkbox" name="status" class="FeatureStatus" data-toggle="toggle" rel="{{$row2->id}}" data-on="Enabled"
                                           data-off="Disabled" data-onstyle="success" data-offstyle="danger"  @if($row2['status']=="1")checked @endif>
                                    <div id="myElem" style="display: none;" class="alert alert-success">Status Enabled</div>
                                </td>
                                <td><a href="/admin/add-attribute/{{$row2->id}}"><button class="btn btn-warning mr-2"><i class="fas fa-list"></i></button></a>
                                    <a href="/admin/edit-product/{{$row2->id}}"><button class="btn btn-success mr-2"><i class="fas fa-pen"></i></button></a>
                                    <a href="/admin/delete-product/{{$row2->id}}"><button class="btn btn-danger" ><i class="fas fa-trash"></i></button></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
