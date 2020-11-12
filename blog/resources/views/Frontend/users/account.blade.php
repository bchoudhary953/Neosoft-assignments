@extends('Frontend.Layout.master')
@section('title')
    Account
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
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">My Account</li>
                </ol>
            </div>
            <div class="row" style="margin-bottom: 100px;">

                <div class="col-lg-4 col-md-12">
                    <div style="border: black 1px solid; padding: 30px;">
                        <div style="padding: 10px;margin-left: 120px;">
                            <a href="{{url('/orders')}}"><i style="font-size: 50px;" class="fa fa-lock"></i> </a>
                        </div>
                        <div>
                            <h4 style="margin-left: 75px;">Change Password</h4>
                            <p style="margin-left: 90px;">Change Password</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div style="border: black 1px solid; padding: 30px;">
                        <div style="padding: 10px;margin-left: 140px; align: center;">
                            <a href="{{url('/orders')}}"><i style="font-size: 50px;" class="fa fa-location-arrow"></i> </a>
                        </div>
                        <div >
                            <h4 style="margin-left: 110px;">My Account</h4>
                            <p style="margin-left: 120px;">Edit Detail</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div style="border: black 1px solid; padding: 30px;">
                        <div style="padding: 10px;margin-left: 120px;">
                            <a href="{{url('/myOrder')}}"><i style="font-size: 50px;" class="fa fa-gift"></i> </a>
                        </div>
                        <div >
                            <h4 style="margin-left: 120px;">My Order</h4>
                            <p style="margin-left: 70px;">Track and View your order</p>
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
