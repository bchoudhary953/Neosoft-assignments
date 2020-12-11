@extends('Backend.Layout.master')
@section('title')
    Add Coupon
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
                    <div class="mb-4"><h4>Add Coupon</h4></div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{url('/admin/save-coupon')}}">
                        @csrf
                        <div class="input-group mb-3">
                            Coupon Code:
                            <input type="text" id="coupon_code" name="coupon_code" class="form-control ml-3 @error('coupon_code') is-invalid @enderror" value="{{ old('coupon_code') }}" autocomplete="coupon_code" autofocus placeholder="Coupon Code">
                            @error('coupon_code')
                                <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            Amount:
                            <input type="text" id="amount" name="amount" class="form-control ml-3 @error('amount') is-invalid @enderror" value="{{ old('amount') }}" autocomplete="amount" autofocus placeholder="Amount">
                            @error('amount')
                                <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            Amount Type:
                            <select  name="amount_type" id="amount_type" class="form-control ml-3 @error('amount_type') is-invalid @enderror">
                                <option value="percentage">Percentage</option>
                                <option value="fixed">Fixed</option>
                            </select>
                            @error('amount_type')
                                <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            Expiry Date:
                            <input type="text" id="datepicker" name="expiry_date" class="form-control ml-3 @error('expiry_date') is-invalid @enderror" value="{{ old('expiry_date') }}" autocomplete="expiry_date" autofocus>
                            @error('expiry_date')
                                <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="d-flex p-2">
                                <a href=""><button type="submit" class="btn btn-primary m-2 ml-5">Add Coupon</button></a>
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
