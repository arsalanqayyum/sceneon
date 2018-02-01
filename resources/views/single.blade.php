@extends('welcome')
@section('content')
    <section id="desc">
        <div class="bg">
            <div class="single-crumb">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>{{$getposts->post_title}}</h2>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="{{asset('/uploads').'/'.$getposts->cat_image}}" class="img-responsive" />
                    </div>
                    <div class="col-sm-6 bg">
                        <h2>{{$getposts->post_title}}</h2>
                        <span class="amount">Rs. {{$getposts->cat_price}}</span>
                        <span class="discount">Rs. {{$getposts->discount}}</span>
                        <h3>Short Description</h3>
                        <p>{{$getposts->summary}}</p>

                        {{--<table class="table-responsive" width="100%">
                            <tr>
                                <th>Posted on: </th>
                                <td>{{$getposts->uploaded_at}}</td>
                            </tr>
                            <tr>
                                <th>Stock: </th>
                                <td>{{$getposts->stock}}</td>
                            </tr>
                            <tr>
                                <th>Discount: </th>
                                <td>Rs.{{$getposts->discount}}</td>
                            </tr>
                            <tr>
                                <th>Brand: </th>
                                <td>{{$getposts->post_title}}</td>
                            </tr>
                            <tr>
                                <th>Quality: </th>
                                <td>{{$getposts->quality}}</td>
                            </tr>
                            <tr>
                                <th>Shipping: </th>
                                <td>{{$getposts->shipping}}</td>
                            </tr>
                        </table>--}}

                        {{--<h3>Quantity</h3>--}}
                       {{-- <div>

                            <div class="input-group">
                	<span class="input-group-btn">
                    	<button type="button" class="btn btn-primary" disabled="disabled" data-type="minus" data-field="quant[1]">
                        	<span class="glyphicon glyphicon-minus"></span>
                        </button>
                    </span>
                                <input type="text" name="qty" id="qty" class="form-control input-number" value="1" min="1" max="10">
                                <span class="input-group-btn">
              			<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="qty">
                  			<span class="glyphicon glyphicon-plus"></span>
              			</button>
                                    <span class="shop-now">
                                        <a class="shop-now btn btn-danger" href="{{url('add-to-cart/'.$getposts->id)}}">Add to Cart</a>
                                    </span>

         			 </span>
                            </div>

                        </div>--}}

                    </div><!---col-sm-6--->

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


                </div>

                <div class="row">
                    <div class="col-sm-9">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                            <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
                            <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <h3>DESCRIPTION</h3>
                                <p>Some content.</p>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <h3>SPECIFICATION</h3>
                                <p>Some content in menu 1.</p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>OTHERS</h3>
                                <p>Some content in menu 2.</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <div class="bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>You might also like!</h1>
                </div>
            </div>
            <div class="row">
                @foreach($related_products as $related)
                    <div class="col-sm-3">
                        <div class="new-items cat">
                            <a href="{{ url('',[$related->id]) }}"><img src="{{asset('/uploads').'/'.$related->cat_image}}"></a>
                            <div class="tags">{{$related->cat_price}}</div>
                            <p>{{$related->brand_title}}</p>
                            <label>{{$related->cat_desc}}</label>
                            <div class="shop-now">
                                <a href="{{url('add-to-cart/'.$related->id)}}"><i class="fa fa-shopping-bag"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



@endsection