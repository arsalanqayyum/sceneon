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
                <th>Order</th>

                <td>{{$vieworder->user_order }}</td>

            </tr>

        </table>


    </div>
    @endsection
