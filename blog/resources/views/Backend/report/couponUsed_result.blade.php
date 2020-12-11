@extends('Backend.Layout.master')
@section('title')
    Coupon Used Result
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
                    <h3 class="card-title">ALL USED COUPON OF
                            @php
                                if(isset($date))
                                {
                                    echo $date ;
                                }
                                elseif(isset($month) && isset($year))
                                    echo $month-$year;
                                else
                                        echo  $year;

                            @endphp
                        </h3>                </div>
                <!-- /.card-header -->
                <div id="message_success" style="display: none;" class="alert alert-success">Status Enabled</div>
                <div id="message_error" style="display: none;" class="alert alert-danger">Status Disabled</div>
                <div class="card-body table-responsive">
                    <table class="table table-head-fixed text-nowrap" id="example1">
                        <thead>
                        <tr>
                            <th>Coupon ID</th>
                            <th>Coupon Code</th>
                            <th>Amount</th>
                            <th>Amount Type</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                            <tr>
                                <td>{{$coupon->id}}</td>
                                <td>{{$coupon->coupon_code}}</td>
                                <td>{{$coupon->amount}}</td>
                                <td>{{$coupon->amount_type}}</td>
                                <td>{{$coupon->expiry_date}}</td>
                                <td>
                                    <input type="checkbox" name="status" class="CouponStatus" data-toggle="toggle" rel="{{$coupon->id}}" data-on="Enabled"
                                           data-off="Disabled" data-onstyle="success" data-offstyle="danger"  @if($coupon['status']=="1")checked @endif>
                                    <div id="myElem" style="display: none;" class="alert alert-success">Status Enabled</div>
                                </td>
                                <td><a href="/admin/edit-coupon/{{$coupon->id}}"><button class="btn btn-success mr-2"><i class="fas fa-pen"></i></button></a>
                                    <a href="/admin/delete-coupon/{{$coupon->id}}"><button class="btn btn-danger" ><i class="fas fa-trash"></i></button></a></td>
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
