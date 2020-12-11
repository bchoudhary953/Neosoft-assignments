@extends('Backend.Layout.master')
@section('title')
    Order Management
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
                    <h3 class="card-title">Order Management</h3>
                    
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-head-fixed text-nowrap" id="example1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name and <br>  Address</th>
                            <th>Products</th>
                            <th>Payment <br>Method</th>
                            <th>Order<br> Status</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $s1=1;
                        @endphp
                        @foreach($orders as $row1)
                            <t>
                                <td><input style="display: none; width: 100px;text-align: center" type="hidden" name="attr[]" value="{{$row1->id}}">{{$s1++}}</td>
                                <td>{{$row1->name}}<br>{{$row1->address1}}<br>{{$row1->address2}}<br>{{$row1->pin_code}}{{$row1->state}}<br>{{$row1->country}}</td>
                                <td>
                                @foreach($row1->orders as $detail)
                                   Product Code: {{$detail->product_code}}:-<br>{{$detail->product_name}}<br>Product Price: ${{$detail->product_price}}<br>Product Quantity: {{$detail->product_qty}}<br>
                                @endforeach
                                </td>
                                <td>{{$row1->payment_method}}</td>
                                <td>{{$row1->order_status}}</td>
                                <td>{{$row1->created_at->format("d-m-Y")}}</td>
                                <td><a href="/admin/update-order-status/{{$row1->id}}"> <button class="btn btn-success">Update</button></a></td>
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
