@extends('layouts.admin-panel.dashboard')

@section('admin-content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>

                    <li>
                        <a href="#">Tables</a>
                    </li>
                    <li class="active">Simple &amp; Dynamic</li>

                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
                    </form>
                </div><!-- /.nav-search -->
            </div>
        </div>
        <form method="post" action="{{route('update',$vieworder->id)}}">
            {{csrf_field()}}
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{$vieworder->name}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$vieworder->email}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$vieworder->address}}</td>
            </tr>
            <tr>
                <th>Created at</th>
                <td>{{$vieworder->created_at}}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td><select name="status" >
                        <option>{{$vieworder->status}}</option>
                        <option>Pending</option>
                        <option>Inprocess</option>
                        <option>Completed</option>
                        <option>Cancel</option>
                    </select>
                    <input type="submit" value="update" class="btn btn-info">
                </td>
            </tr>

            <tr>
                <th>Order</th>

                <td>
                    <table class="table table-bordered">
                        <tr>

                            <th>Item Image</th>
                            <th>Item Description</th>
                            <th>Qty</th>
                            <th>Brand Title</th>
                            <th>Brand Category</th>
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Discount</th>
                        </tr>
                        @foreach( $vieworder->user_order['items'] as $order )
                            <tr>
                                <td><img src="{{asset('/uploads').'/'.$order['cat_image']}}" alt="" width="120px"></td>
                                <td>{{$order['cat_desc']}}</td>
                                <td>{{$order['qty']}}</td>
                                <td>{{$order['brand']}}</td>
                                <td>{{$order['brand_title']}}</td>
                                <td>{{$order['cat_price']}}</td>
                                <td>{{$order['price']}}</td>
                                <td>{{$order['discount']}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5">
                                <h3>Total Quantity: {{ $vieworder->user_order['totalQty'] }}</h3>
                            </td>
                            <td colspan="5">
                                <h3>Total Price: {{ $vieworder->user_order['totalPrice'] }}</h3>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
        </form>

    </div>
    @endsection
