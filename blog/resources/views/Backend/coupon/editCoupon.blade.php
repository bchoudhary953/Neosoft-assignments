@extends('Backend.Layout.master')
@section('title')
    Edit Coupon
@endsection

@section('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div>
        <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
            <div class="card ">
                <div class="card-body register-card-body">
                    <div class="mb-4"><h4>Edit Coupon</h4></div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{url('/admin/edit-coupon/'.$coupons->id)}}">
                        @csrf
                        <div class="input-group mb-3">
                            Coupon Code:
                            <input type="text" id="coupon_code" class="form-control ml-3" name="coupon_code" required autocomplete="coupon_code" autofocus value="{{$coupons->coupon_code}}">
                        </div>
                        <div class="input-group mb-3">
                            Amount:
                            <input type="text" id="amount" class="form-control ml-3" name="amount" required autocomplete="amount" autofocus value="{{$coupons->amount}}">
                        </div>
                        <div class="input-group mb-3">
                            Amount Type:
                            <select name="amount_type" id="amount_type" class="form-control">
                                <option @if($coupons->amount_type=="Percentage") selected @endif value="Percentage">Percentage</option>
                                <option @if($coupons->amount_type=="Fixed") selected @endif value="Fixed">Fixed</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            Expiry Date:
                            <input type="text" class="form-control" value="{{$coupons->expiry_date}}" id="datepicker" name="expiry_date" required>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="d-flex p-2">
                                <a href=""><button type="submit" class="btn btn-primary m-2">Update</button></a>
                                <a href="/admin/view-coupons" class="btn btn-danger m-2">Cancel</a>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker({
                minDate:0,
                dateFormat:'yy-mm-dd',
            });
        } );
    </script>
@endsection
