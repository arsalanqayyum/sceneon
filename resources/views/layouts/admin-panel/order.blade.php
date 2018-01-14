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

        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Order</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach($order as $getpost)
                <tr>
                    <td>{{$getpost->name}}</td>
                    <td>{{$getpost->email}}</td>
                    <td>{{$getpost->address}}</td>
                    <td>{{$getpost->created_at}}</td>
                    <td>{{$getpost->status}}</td>
                    <td>
                        <a href="{{route('vieworder',$getpost->id)}}"  class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                        <a href="#" data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
                    </td>
                </tr>
                @endforeach
        </table>


    </div>
    @endsection