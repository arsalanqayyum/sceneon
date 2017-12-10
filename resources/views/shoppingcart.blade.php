
@extends('welcome')
@section('content')

    @if(session()->has('msg'))
        <div class="alert alert-success">
            {{ session()->get('msg') }}
        </div>
    @endif


    @if(Request::session()->has('cart'))


    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Your Shopping Cart</h1>
            </div>
        </div>
        <div class="row cart_table">
            <table class="bg table table-condensed">
                <thead>
                <tr>
                    <th>Preview</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $products)
                <tr>
                    <td width="260"><img src="{{$products['item']['cat_image']}}"></td>
                    <td>
                        <h2 class="checkout-title">{{$products['item']['post_title']}}</h2><br/>
                        <h4 class="checkout-cat">Category: {{$products['item']['cat_name']}}</h4>
                    </td>
                    <td>{{$products['item']['cat_price']}}</td>
                    <td>{{$products['qty']}}</td>
                    <td class="checkout-total">{{$products['price']}}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('reducedbyone',['id'=>$products['item']['id']])}}">Reduce by 1</a> </li>
                                <li><a href="{{route('removeall',['id'=>$products['item']['id']])}}">Reduce All</a> </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a href="{{url('/')}}" class="btn btn-primary">Continue Shopping</a>
                <a id="cartEmpty" href="javascript:void(0)" class="btn btn-primary">Empty Cart</a>
            </div>
            <div class="col-sm-6">
                <div class="total">
                    <ul class="list-unstyled">
                        <li>Total Items: <span class="float">{{ Session::has('cart') ? Session::get('cart')->totalQty : 0}}</span></li>
                        <li>Amount: <span class="float">{{$totalPrice}}</span></li>
                        <li>Payment: <span class="float">On Delievery</span></li>
                        <li>Shipping: <span class="float">Free</span></li>
                        <li class="total-price">Total {{$totalPrice}}</li>
                    </ul>
                    <a href="{{url('checkout')}}" class="btn btn-warning">checkout</a>
                </div>
            </div>
        </div>
    </div>

    @endif




@endsection