@extends('Frontend.Layout.master')
@section('title')
    {{$cmsPage->title}}
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

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Category</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-products-->
                                @foreach($categories as $cat)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">
                                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                    {{$cat->name}}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="{{$cat->id}}" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul>
                                                    @foreach($cat->categories as $subcat)
                                                        <li><a href="{{$subcat->url}}">{{$subcat->name}} </a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div><!--/category-products-->
                        </div>
                    </div>
                    <div class="col-sm-9 padding-right">

                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">{{$cmsPage->description}}</h2>

                        </div><!--features_items-->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
