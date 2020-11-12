@extends('Frontend.Layout.master')
@section('title')
    Order Detail
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
                    <li class="active">Order Detail</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="">Product Code</td>
                        <td class="">Product Name</td>
                        <td class="">Product Price</td>
                        <td class="">Product Quantity</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderDetails->orders as $detail)
                        <tr>
                            <td class="">{{$detail->product_code}}</td>
                            <td class="">{{$detail->product_name}}</td>
                            <td class="">${{$detail->product_price}}</td>
                            <td class="">{{$detail->product_qty}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
@section('scripts')
@endsection
