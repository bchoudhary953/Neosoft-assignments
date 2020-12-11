@extends('Backend.Layout.master')
@section('title')
    Update Order status
@endsection

@section('styles')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div>
        <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
            <div class="card ">
                <div class="card-body register-card-body">
                    <div class="mb-4"><h4>Edit Order Status</h4></div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{url('/admin/update-order-status/'.$orders->id)}}">
                        @csrf
                        <div class="input-group mb-3">
                            Name:
                            {{$orders->name}}
                        </div>
                        <div class="input-group mb-3">
                            Grand Total:
                            {{$orders->grand_total}}
                        </div>
                        <div class="input-group mb-3">
                            Payment Method:
                            {{$orders->payment_method}}
                        </div>
                        <div class="input-group mb-3">
                            Order Status:
                            <select name="status" id="status" class="form-control ml-3">
                                <option value="new" @if('new'==$orders->order_status) selected @endif>New</option>
                                <option value="delivered" @if('delivered'==$orders->order_status) selected @endif>Delivered</option>
                                <option value="pending" @if('pending'==$orders->order_status) selected @endif>Pending</option>
                                <option value="completed" @if('completed'==$orders->order_status) selected @endif>Completed</option>
                            </select>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="d-flex p-2">
                                <a href=""><button type="submit" class="btn btn-primary m-2">Status Updated</button></a>
                                <a href="/admin/view-orders" class="btn btn-danger m-2">Cancel</a>
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




