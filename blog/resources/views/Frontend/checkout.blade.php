@extends('Frontend.Layout.master')
@section('title')
    Checkout
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
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="shopper-informations">
            <div class="row">
                <form action="{{url('/checkout')}}" method="POST">@csrf
                <div class="col-sm-6">
                    <div class="shopper-info">
                        <p>Bill To</p>
                        @foreach($addresses as $address)
                            <h4>Address:</h4>
                            <div class="form-check" style="margin-bottom: 30px;">
                                <input class="form-check-input" id="addtobill" value="{{$address->id}}" type="radio" name="biiling_address">
                               {{$address->address1}},{{$address->address2}},{{$address->pin_code}},{{$address->state}},{{$address->country}}
                                <input type="hidden" value="{{$address->address1}}" name="billing1_address1" id="billing1_address1">
                                <input type="hidden" value="{{$address->address2}}" name="billing1_address2" id="billing1_address2">
                                <input type="hidden" value="{{$address->pin_code}}" name="billing1_pin_code" id="billing1_pin_code">
                                <input type="hidden" value="{{$address->state}}" name="billing1_state" id="billing1_state">
                                <input type="hidden" value="{{$address->country}}" name="billing1_country" id="billing1_country">
                            </div>
                        @endforeach
                        <h4>Address:</h4>
                        <input type="text" class="form-control" name="billing_first_name" id="billing_first_name" value="{{$userDetail->first_name}} " placeholder="Name">
                        <input type="text" class="form-control" name="billing_address1" id="billing_address1" placeholder="Address 1 ">
                            <input type="text" class="form-control" name="billing_address2" id="billing_address2" placeholder=" Address 2">
                            <input type="text" class="form-control" name="billing_pin_code" id="billing_pin_code" placeholder="Pin Code">
                            <input type="text" class="form-control" name="billing_state" id="billing_state" placeholder="State">
                            <select name="billing_country" id="billing_country">
                                <option value="0">-- Country --</option>
                                 @foreach($countries as $country)
                                        <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        <input type="text" class="form-control" name="billing_mobile_no" id="billing_mobile_no" value="{{$userDetail->mobile}}" placeholder="Mobile number">
                        <label><input id="billtoship" type="checkbox"> Shipping to bill address</label>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="shopper-info">
                        <p>Ship To</p>
                        @foreach($addresses as $address)
                            <h4>Address:</h4>
                            <div class="form-check" style="margin-bottom: 30px;">
                                <input class="form-check-input" value="{{$address->id}}" type="radio" id="addtoship" name="shipping_address">
                                {{$address->address1}},{{$address->address2}},{{$address->pin_code}},{{$address->state}},{{$address->country}}
                                <input type="hidden" value="{{$address->address1}}" name="shipping1_address1" id="shipping1_address1">
                                <input type="hidden" value="{{$address->address2}}" name="shipping1_address2" id="shipping1_address2">
                                <input type="hidden" value="{{$address->pin_code}}" name="shipping1_pin_code" id="shipping1_pin_code">
                                <input type="hidden" value="{{$address->state}}" name="shipping1_state" id="shipping1_state">
                                <input type="hidden" value="{{$address->country}}" name="shipping1_country" id="shipping1_country">
                            </div>
                        @endforeach
                        <h4>Address:</h4>
                            <input type="text" class="form-control" id="shipping_first_name" name="shipping_first_name" value="{{$userDetail->first_name}}" placeholder="Name ">
                            <input type="text" class="form-control" id="shipping_address1" name="shipping_address1" placeholder="Address 1 ">
                            <input type="text" class="form-control" id="shipping_address2" name="shipping_address2" placeholder=" Address 2">
                            <input type="text" class="form-control" id="shipping_pin_code" name="shipping_pin_code" placeholder="Pin Code">
                            <input type="text" class="form-control" id="shipping_state"  name="shipping_state" placeholder="State">
                            <select  name="shipping_country" id="shipping_country" >
                                <option value="0">-- Country --</option>
                                @foreach($countries as $country)
                                        <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control" id="shipping_mobile_no" name="shipping_mobile_no" value="{{$userDetail->mobile}}" placeholder="Mobile Number">
                        <a href="/order-review"><button class="btn-primary" style="padding: 10px; width: 200px; margin: 30px; margin-left: -100px" type="submit">Check Out</button></a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section> <!--/#cart_items-->
@endsection
@section('scripts')
@endsection
