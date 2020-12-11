@extends('Frontend.Layout.master')
@section('title')
    Track Order
@endsection

@section('styles')
@endsection

@section('content')
    <div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <section id="slider">

            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="login-form"><!--login form-->
                            <h2>Track Your Order</h2>
                            <form action="/track" method="post">
                                @csrf
                                <input type="email" id="email" name="email" placeholder="Enter Email ID" />
                                <input type="text" id="order_id" name="order_id" placeholder="Enter Order ID" />
                                <button class="btn btn-primary" type="submit" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Track Order</button>
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample2">
                                        <div class="card card-body">

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!--/login form-->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
