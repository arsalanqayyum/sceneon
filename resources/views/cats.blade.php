@extends('welcome')
@section('content')
    <section id="desc">
        <div class="bg">
            <div class="single-crumb">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>{{$allproducts->pluck('cat_name')[0]}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <ul class="list-unstyled">
                                <li class="cat-head">Categories</li>
                                @foreach($sidecats as $cats)
                                    <a href="{{ url('cats',[$cats->cat_name]) }}"><li>{{$cats->cat_name}} <span class="badge">{{$cats->counter}}</span></li></a>

                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar">
                            <ul class="list-unstyled">
                                <li class="cat-head">By Brands</li>
                                @foreach($brands as $brand)
                                    <a href="{{url('brands',[$brand->brand])}}"><li>{{$brand->brand}}<span class="badge">{{$brand->counter}}</span></li></a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        @foreach($allproducts as $product)
                            <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
                                <div class="new-items cat">
                                    <img src="{{$ghar.'/'.$product->cat_image}}" class="img-responsive"/>
                                    <div class="tags">{{$product->cat_price}}</div>

                                    <label>{{$product->cat_desc}}</label>
                                    <div class="shop-now">
                                        <a href="{{url('',$product->id)}}">shop now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection