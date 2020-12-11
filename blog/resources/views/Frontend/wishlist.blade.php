@extends('Frontend.Layout.master')
@section('title')
    Wishlist
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
                    <li class="active">Wishlist</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td>Add to Cart</td>
                        <td class="price">Remove</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wishlist as $list)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="upload/product/{{$list->image}}" alt="" style="width: 120px; height: 120px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$list->product_name}}</a></h4>
                                <p>Web ID:{{$list->product_id}}</p>
                            <td class="cart_description">
                                <a href="/add-cart/{{$list->id}}" ><button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></a>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="/delete/{{$list->id}}"><i class="fa fa-times"></i></a>
                            </td>
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
