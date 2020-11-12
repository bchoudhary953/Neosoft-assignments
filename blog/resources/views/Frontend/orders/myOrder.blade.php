@extends('Frontend.Layout.master')
@section('title')
    My Order
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
                    <li class="active">My Order</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="">Order ID</td>
                        <td class="">Ordered Product</td>
                        <td class="">Payment Method</td>
                        <td>Coupon Code</td>
                        <td>Order Status</td>
                        <td class="total">Grand Total</td>
                        <td class="">Order Date</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="">{{$order->id}}</td>
                        <td class="">
                            @foreach($order->orders as $pro)
                                <a href="/myOrder/{{$order->id}}" style="color: black">
                                    {{$pro->product_code}}
                                ({{$pro->product_qty}})<br>
                                </a>
                            @endforeach
                        </td>
                        <td class="">{{$order->payment_method}}</td>
                        <td>{{$order->coupon_code}}</td>
                        <td>{{$order->order_status}}</td>
                        <td class="total">{{$order->grand_total}}</td>
                        <td class="">{{$order->created_at}}</td>
                        <td><a href="/myOrder/{{$order->id}}"><button class="btn btn-primary" ><i class="fa fa-eye">View Detail</i></button></a>
                            <a href="/track/{{$order->id}}"><button class="btn btn-primary" ><i class="fa fa-">Track Order</i></button></a></td>
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
