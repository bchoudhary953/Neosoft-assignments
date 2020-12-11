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
                       <h1>Your Order Status is {{\Illuminate\Support\Facades\Session::get('OrderStatus')}}

                       </h1>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
