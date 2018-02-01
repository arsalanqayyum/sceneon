@extends('welcome')
@section('content')
    <section id="desc">
        <div class="bg">
            <div class="single-crumb">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>{{$q}}</h2>
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
                                    <a href="{{ url('products',[$cats->category]) }}"><li>{{$cats->category}} <span class="badge">{{$cats->counter}}</span></li></a>
                                @endforeach

                                <li class="cat-head">By Brands</li>
                                @foreach($brands as $brand)
                                    <a href="{{url('brands',[$brand->prod_cat])}}"><li>{{$brand->prod_cat}}<span class="badge">{{$brand->counter}}</span></li></a>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <div class="col-sm-9">
                        <div class="navigation-tab">
                            <label style="font-weight: normal;color: #fff;font-size: 16px;">search result for {{$q}}</label>
                        </div>
                        @if(session()->has('msg'))
                            <div class="title">
                                Ooops Something went wrong!
                                <br>Try New Search
                            </div>
                        @endif
                        @if(isset($details))
                        @foreach($details as $product)
                            <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">
                                <div class="new-items cat">
                                    <img src="{{asset('/uploads').'/'.$product->cat_image}}" class="img-responsive"/>
                                    <div class="tags">{{$product->cat_price}}</div>

                                    <label>{{$product->cat_desc}}</label>
                                    <div class="shop-now">
                                        <a href="{{url('add-to-cart/'.$product->id)}}">shop now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection