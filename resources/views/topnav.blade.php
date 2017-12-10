<div id="topnav">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-6">
                <ul class="list-inline">
                    @foreach($get_nav as $value)
                    <li><a href="{{url($value->slug)}}">{!! $value->menu !!} </a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-6">
                <ul class="list-inline text-right">
                    <li>
                        <a href="{{url ('shoppingcart')}}">
                            <i class="fa fa-shopping-bag"></i>
                        </a>
                        <span class="badge">
                            {{ Session::has('cart') ? Session::get('cart')->totalQty : 0}}
                        </span>
                    </li>


                    <!--<li><a href="#"><i class="fa fa-2x fa-heart-o"></i> Wishlist</a></li>-->

                </ul>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="450">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="uploads/logo.png" class="img-responsive logo" /></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">

                <li><a href="#">Deals</a></li>
                <li><a href="#">Trending</a></li>
                <li><a href="#">Clothing</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">categories
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>

            </ul>
            <div class="navbar-right">
                <form method="POST" action="{{url('search')}}" class="navbar-form" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="q">
                        <span class="input-group-btn">
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search">
									<span class="sr-only">Search...</span>
								</span>
							</button>
						</span>
                    </div>
                </form>
            </div>
        </div>

        <!--<ul class="list-inline right uc">
            <li><a href="#"><img src="shopping_cart1600.png" class="img-responsive" /></a> <span>Cart</span></li>
            <li><a href="#"><i class="fa fa-2x fa-heart-o"></i></a></li>
          </ul>-->

    </div>


</nav>