@extends('Frontend.Layout.master')
@section('title')
    Order-Review
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
                    <li class="active">Order review</li>
                </ol>
            </div><!--/breadcrums-->
            <div class="review-payment" style="margin-bottom: 40px;">
                <h2>Review & Payment</h2>
            </div>
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-6">
                            <div class="shopper-info">
                                <p>Billing Address</p>
                                <div class="form-group">{{$userDetail->first_name}}</div>
                                <div class="form-group">{{$userDetail->address1}}</div>
                                <div class="form-group">{{$userDetail->address2}}</div>
                                <div class="form-group">{{$userDetail->pin_code}}</div>
                                <div class="form-group">{{$userDetail->state}}</div>
                                <div class="form-group">{{$userDetail->country}}</div>
                                <div class="form-group">{{$userDetail->mobile}}</div>
                            </div>
                        </div>
                    <div class="col-sm-6">
                        <div class="shopper-info">
                            <p>Shipping Address</p>
                            <div class="form-group">{{$userDetail->first_name}}</div>
                            <div class="form-group">{{$shippingDetails->address1}}</div>
                            <div class="form-group">{{$shippingDetails->address2}}</div>
                            <div class="form-group">{{$shippingDetails->pin_code}}</div>
                            <div class="form-group">{{$shippingDetails->state}}</div>
                            <div class="form-group">{{$shippingDetails->country}}</div>
                            <div class="form-group">{{$shippingDetails->mobile}}</div>
                        </div>
                    </div>
                </div>
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
                    </thead>  <tbody>
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
                                    {{$cart->quantity}}
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">${{$sub_total}}</p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="total_area">
                    <ul>

                            <li>Cart Sub Total <span>${{$total}}
                            <li>Coupon Discount (-)<span>
                                    @if(!empty(\Illuminate\Support\Facades\Session::get('CouponAmount')))
                                        ${{\Illuminate\Support\Facades\Session::get('CouponAmount')}}
                                    @else
                                        $ 0
                                    @endif
                            <li>Shipping Cost (+) <span>$<?php echo \Illuminate\Support\Facades\Session::get('ShippingCost') ?></span></li>
                            <li>Total <span>${{$grandTotal = $total-\Illuminate\Support\Facades\Session::get('CouponAmount')+ \Illuminate\Support\Facades\Session::get('ShippingCost')}}</span></li>

                    </ul
                </div>
            </div>
            <form method="post" action="{{url('/place-order')}}" name="paymentForm" id="paymentForm">
                @csrf
                <input type="hidden" value="{{$grandTotal}}"name="grand_total">
                <div class="payment-options" style="margin-top: 50px;margin-left: 50px;">
                    <span>
                        <label><input type="radio" class="cod" name="payment_method" value="cod"> Cash On Delivery</label>
                    </span>
                    <span>
                        <label><input type="radio" class="paypal" name="payment_method" value="paypal"> Paypal</label>
                    </span>
                    <button onclick="return selectPaymentMethod()" class="btn" style="float: right;margin-right: 30px; background-color: #fc9803; color: white; height: 40px;width: 100px;" type="submit">Place Order</button>
                </div>
            </form>
        </div>
    </section> <!--/#cart_items-->
@endsection
@section('scripts')
    <script>
        //payment method
        function selectPaymentMethod(){
            if ($('.paypal').is(':checked') || $('.cod').is(':checked')){
                //alert('checked');
                return true;
            }
            else{
                alert('Please select payment method');
                return false;
            }
        }
    </script>
@endsection
