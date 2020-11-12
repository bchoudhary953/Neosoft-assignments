@extends('Frontend.Layout.master')
@section('title')
    Thanks
@endsection

@section('styles')
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <section id="cart_items">
        <div class="container">
            <h1 align="center">Thanks For Purchasing With Us!</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div align="center" style="padding: 50px;">
                        <h2>YOUR COD ORDER HAS BEEN PLACED</h2>
                        <P>Your Order Numbar is {{\Illuminate\Support\Facades\Session::get('order_id')}} And Total Payable About is ${{\Illuminate\Support\Facades\Session::get('grand_total')}}</P>
                    </div>
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->


@endsection
<?php
    \Illuminate\Support\Facades\Session::forget('grand_total');
    \Illuminate\Support\Facades\Session::forget('order_id');
    \Illuminate\Support\Facades\Session::forget('CouponCode');
    \Illuminate\Support\Facades\Session::forget('CouponAmount');
    \Illuminate\Support\Facades\Session::forget('ShippingCost');
?>
@section('scripts')
@endsection
