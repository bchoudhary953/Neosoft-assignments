@extends('Frontend.Layout.master')
@section('title')
    Cart
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
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @php $total= 0;@endphp
                    @foreach($carts as $cart)
                        @php
                            $sub_total = $cart->price * $cart->quantity;
                            $total += $sub_total;
                        @endphp
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="upload/product/{{$cart->image}}" alt="" style="width: 120px; height: 120px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$cart->product_name}}</a></h4>
                                <p>Web ID:{{$cart->product_id}}</p>
                            </td>
                            <td class="cart_price">
                                <p>${{$cart->price}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="/quantity-increase/{{$cart->id}}"> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" size="2">
                                    @if($cart->quantity>1)
                                    <a class="cart_quantity_down" href="/quantity-decrease/{{$cart->id}}"> - </a>
                                    @endif
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">${{$sub_total}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="/remove/{{$cart->id}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area" style="padding: 95px;">
                    <form action="{{url('/cart/apply-coupon')}}" method="post">
                        @csrf
                        <div class="input-group input-group-sm" style="display: flex">
                            <input class="form-control" name="coupon_code" style="margin-top: 18px; width: 300px;" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Apply Coupon</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>

                        <li>Cart Sub Total <span>${{$total}}
                        @if(!empty(\Illuminate\Support\Facades\Session::get('CouponAmount')))
                        <li>Coupon Discount (-)<span>
                                @if(!empty(\Illuminate\Support\Facades\Session::get('CouponAmount')))
                                ${{\Illuminate\Support\Facades\Session::get('CouponAmount')}}
                                @else
                                $ 0
                                @endif
                        <li>Shipping Cost (+)<span>$<?php echo \Illuminate\Support\Facades\Session::get('ShippingCost') ?></span></li>
                        @endif
                        <li>Total <span>${{$total-\Illuminate\Support\Facades\Session::get('CouponAmount')+ \Illuminate\Support\Facades\Session::get('ShippingCost')}}</span></li>

                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="/checkout">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
@endsection
