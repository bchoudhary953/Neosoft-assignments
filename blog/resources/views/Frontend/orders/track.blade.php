@extends('Frontend.Layout.master')
@section('title')
    Track Order
@endsection

@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <li class="active">Track Order</li>
                </ol>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-md-4"><h3>Order No.:</h3></div>
                    <div class="col-md-4"><h3>Order No.:</h3></div>
                    <div class="col-md-4"><h3>Order No.:<mark>Status</mark></h3></div>
                </div>
                <div class="progress" style="margin: 10px auto;">
                <ul class="progress-tracker" style="text-align: center">
                    <li class="progress-step is-complete" style="display: inline-block; width: 100px;">1<i class="fa fa-circle"></i> </li>
                    <li class="progress-step is-complete" style="display: inline-block; width: 100px;">2<i class="fa fa-circle"></i></li>
                    <li class="progress-step is-active" style="display: inline-block; width: 100px;">3<i class="fa fa-circle"></i></li>
                    <li class="progress-step" style="display: inline-block; width: 100px;">4<i class="fa fa-circle"></i></li>
                    <li class="progress-step" style="display: inline-block; width: 100px;">5<i class="fa fa-circle"></i></li>
                </ul>
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
@section('scripts')
@endsection
