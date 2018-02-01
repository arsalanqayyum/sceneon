@extends('welcome')
@section('content')
    <section id="desc">
        <div class="bg">
            <div class="single-crumb">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>
                                {{$category}}
                            </h2>
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
                                <a href="{{url('products',[$cats->category])}}">
                                    <li>{{$cats->category}} <span class="badge">{{$cats->counter}}</span></li>
                                </a>

                                    @endforeach

                                <li class="cat-head">By Brands</li>
                                @foreach($brands as $brand)
                                    <a href="{{url ('brands',[$brand->prod_cat])}}"><li>{{$brand->prod_cat}}<span class="badge">{{$brand->counter}}</span></li></a>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                    <div class="col-sm-9">
                        <div class="navigation-tab">
                            <h3>{{$category}}</h3>
                        </div>
                        @foreach($allproducts as $product)
                        <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
                            <div class="new-items cat">
                                <a href="{{ url('',[$product->id]) }}">
                                    <img src="{{asset('/uploads').'/'.$product->cat_image}}" class="img-responsive"/>
                                </a>
                                <div class="tags">{{$product->cat_price}}</div>
                                <p>{{$product->brand_title}}</p>
                                <label>{{$product->cat_desc}}</label>
                                <div class="shop-now">
                                    <a href="{{url('add-to-cart/'.$product->id)}}"><i class="fa fa-shopping-bag"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                            @endforeach

                    </div>
                    <div style="margin: auto; display: block;text-align: center">
                        {{$allproducts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection