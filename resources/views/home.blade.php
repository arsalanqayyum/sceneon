
@extends('welcome')

@section('content')

    <div id="myCarousel" class="carousel slide slider" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="slider/bannerofsceneon1.png" alt="">
            </div>

            <div class="item">
                <img src="slider/bannerofsceneon2.png" alt="Chicago">
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <div class="container bg">
        <div class="row brdr">
            <div class="col-lg-6 col-sm-6 col-xs-6">
                <h1>{{$cats->pluck('cat_name')[0]}}</h1>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-6">
                <span class="right"><a href="{{url('products',[$cats->pluck('cat_name')[0]])}}">view more</a></span>
            </div>
        </div>

        <div class="row">
            @foreach($cats as $product)
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 brdr-right">
                    <div class="new-items">
                        <a href="{{url('',[$product->id])}}"><img src="{{$product->cat_image}}" class="img-responsive"/></a>
                        <div class="tags">{{$product->cat_price}}</div>
                        <div class="overlay">
                            <a href="#"><i class="fa fa-plus"></i> Add to Cart</a>
                            <a href="#"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                        </div>
                        <label>{{$product->cat_desc}}</label>
                        <div class="shop-now">
                            <a href="{{url('add-to-cart/'.$product->id)}}">shop now</a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>



    <div class="container bg">
        <div class="row brdr">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h1 class="sticker">{{$deal->pluck('cat_name')[0]}}</h1>
                <p class="cntnt">{{$deal->pluck('cat_content')[0]}}</p>
                <div class="shop-now">
                    <a href="{{url('products',[$deal->pluck('cat_name')[0]])}}">view more</a>
                </div>
            </div>
            @foreach($deal as $product)
                <div class="col-lg-3 col-md-3 col-sm-12 brdr-right">
                    <div class="new-items">
                        <a href="{{url('',[$product->id])}}"><img src="{{$product->cat_image}}" class="img-responsive"/></a>
                        <div class="tags">{{$product->post_title}}</div>
                        <label>{{$product->cat_desc}}</label>
                        <div class="shop-now">
                            <a href="{{url('add-to-cart/'.$product->id)}}">shop now</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>


    <div class="container bg">
        <div class="row">
            <div class="col-sm-3">
                <h1 class="sticker">{{$new_arrivals->pluck('cat_name')[0]}}</h1>
                <p class="cntnt">{{$new_arrivals->pluck('cat_content')[0]}}</p>
                <div class="shop-now">
                    <a href="{{url('products',[$new_arrivals->pluck('cat_name')[0]])}}">shop now</a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="owl-carousel owl-theme">
                    @foreach($new_arrivals as $product)
                        <div class=""><img src="{{$product->cat_image}}" class="img-thumbnail lazyOwl" /> </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="big-pic">
        <img src="uploads/images.jpg" width="100%" class="img-responsive" />
    </div>

    <div class="bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($new_arrivals as $product)
                            <div class="item"><img src="{{$product->cat_image}}" class="img-thumbnail lazyOwl" /> </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="text-center">{{$top_brands->pluck('title')[0]}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="list-inline text-center line-height">
                        @foreach($top_brands as $brands)
                            <li><img src="{{$brands->brand_img}}" class="img-thumbnail" /></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

