
@extends('welcome')

@section('content')

    <div id="myCarousel" class="carousel slide slider" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach ($sliders as $key => $slide)
            <li data-target="#myCarousel" data-slide-to="{{$slide->index}}" class="{{ $key == 0 ? ' active' : '' }}"></li>
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        @foreach ($sliders as $key => $slide)
            <div class="item{{ $key == 0 ? ' active' : '' }}">
                <img src="{{ $ghar.'/slider/'.$slide->image }}">
            </div>
        @endforeach
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
                <h1 class="new-sticker">{{$catsname->pluck('category')[0]}}</h1>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-6">
                <span class="right "><a href="{{url('products',[$catsname->pluck('category')[0]])}}">view more</a></span>
            </div>
        </div>

        <div class="row">
            @foreach($cats as $product)
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 brdr-right">
                    <div class="new-items">
                        <a href="{{url('',[$product->id])}}">
                            <img src="{{asset('/uploads').'/'.$product->cat_image}}" class="img-responsive"/>
                        </a>
                        <div class="tags">{{$product->cat_price}}</div>
                        <div class="overlay">
                            <a href="#"><i class="fa fa-plus"></i> Add to Cart</a>
                            <a href="#"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                        </div>
                        <p>{{$product->brand_title}}</p>
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
                <h1 class="sticker">{{$catsname->pluck('category')[1]}}</h1>
                <p class="cntnt">{{$deal->pluck('cat_content')[0]}}</p>
                <div class="view-all">
                    <a href="{{url('products',[$catsname->pluck('category')[1]])}}">view more</a>
                </div>
            </div>
            @foreach($deal as $product)
                <div class="col-lg-3 col-md-3 col-sm-12 brdr-right">
                    <div class="new-items">
                        <a href="{{url('',[$product->id])}}"><img src="{{url('').'/uploads/'.$product->cat_image}}" class="img-responsive"/></a>
                        <div class="tags">{{$product->post_title}}</div>
                        <label><strong>Rs. {{$product->cat_price}}</strong></label>
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
                <h1 class="sticker">{{$catsname->pluck('category')[2]}}</h1>
                <p class="cntnt">{{$new_arrivals->pluck('cat_content')[0]}}</p>
                <div class="view-all">
                    <a href="{{url('products',[$catsname->pluck('category')[2]])}}">shop now</a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="owl-carousel owl-theme">
                    @foreach($new_arrivals as $product)
                        <div class="">
                            <a href="{{url('',[$product->id])}}"><img src="{{url('').'/uploads/'.$product->cat_image}}" class="img-thumbnail lazyOwl" /></a>
                        </div>
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
                <div class="">
                    <div class="owl-carousel owl-theme">
                        @foreach($new_arrivals as $product)
                            <div class="item"><img src="{{url('').'/uploads/'.$product->cat_image}}" class="img-thumbnail lazyOwl" style="height: 300px !important;" /> </div>
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
                            <li><img src="{{asset('/brands'). '/'. $brands->brand_img}}" class="img-thumbnail" /></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

