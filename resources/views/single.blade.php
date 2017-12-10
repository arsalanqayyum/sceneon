@extends('welcome')
@section('content')
    <section id="desc">
        <div class="bg">
            <div class="single-crumb">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>{{$getposts->post_title}}</h1>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="{{$getposts->cat_image}}" class="img-responsive" />
                    </div>
                    <div class="col-sm-6 bg">
                        <h2>{{$getposts->post_title}}</h2>
                        <span class="amount">Rs. {{$getposts->cat_price}}</span>
                        <span class="discount">Rs. {{$getposts->discount}}</span>
                        <h3>Short Description</h3>
                        <p>{{$getposts->summary}}</p>

                        <table class="table-responsive" width="100%">
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
                        </table>

                        <h3>Quantity</h3>
                        <div>

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

                        </div>

                    </div><!---col-sm-6--->
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
                            <a href="{{ url('',[$related->id]) }}"><img src="{{$related->cat_image}}"></a>
                            <div class="tags">{{$related->cat_price}}</div>
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