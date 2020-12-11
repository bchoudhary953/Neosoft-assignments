@extends('Frontend.Layout.master')
@section('title')
    My Account
@endsection

@section('styles')
    <style>
        input{
            margin-top: 10px;
        }
    </style>
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
            </div><!--/breadcrums-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="login-form"><!--login form-->
                            <h2>Your account</h2>
                            <form action="/changeDetail/{{$user_detail->id}}" method="post">
                                @csrf
                                <input type="text" id="first_name" name="first_name" value="{{$user_detail->first_name}}" />
                                <input type="text" id="last_name" name="last_name" value="{{$user_detail->last_name}}" />
                                <input type="text" id="email" name="email" value="{{$user_detail->email}}" />
                                <input type="text" id="address1" name="address1" value="{{$user_detail->address1}}" placeholder="Address1" />
                                <input type="text" id="address2" name="address2" value="{{$user_detail->address2}}" placeholder="Address2"  />
                                <input type="text" id="pin_code" name="pin_code" value="{{$user_detail->pin_code}}"placeholder="Pin Code"  />
                                <input type="text" id="state" name="state" value="{{$user_detail->state}}" placeholder="State"  />
                                <select type="text" id="country" name="country">
                                    <option>------  country  ------</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->country_name}}" @if($country->country_name==$user_detail->country) selected @endif>{{$country->country_name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" id="mobile_no" name="mobile_no" value="{{$user_detail->mobile  }}" placeholder="Mobile Number" />

                                <button style="margin-bottom: 50px;" type="submit" class="btn btn-default mb-4">Save</button>
                            </form>
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
@section('scripts')
@endsection
