@extends('layouts.admin-panel.dashboard')

@section('admin-content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <form method="GET" action="{{route('filter')}}">
                    {{csrf_field()}}
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>

                    <li>
                        <a href="#">Tables</a>
                    </li>
                    <li class="active">Simple &amp; Dynamic</li>
                    <li>Filter</li>
                    <li><select name="status">
                            <option value="Pending">Pending</option>
                            <option value="Inprocess">Inprocess</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancel">Cancel</option>
                        </select>
                    </li>
                    <li>
                        <input type="submit" value="Go" class="btn btn-info">
                    </li>

                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
                    </form>
                </div><!-- /.nav-search -->
                </form>
            </div>

        </div>

        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Cell</th>
                <th>Address</th>
                <th>Order</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach($order as $getpost)
                <tr>
                    <td>{{$getpost->name}}</td>
                    <td>{{$getpost->lastname}}</td>
                    <td>{{$getpost->email}}</td>
                    <td>{{$getpost->cell}}</td>
                    <td>{{$getpost->address}}</td>
                    <td>{{$getpost->created_at}}</td>
                    <td>{{$getpost->status}}</td>
                    <td>
                        <a href="{{route('vieworder',$getpost->id)}}"  class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                        <a href="#" data-toggle="modal" data-target="#deleteModal_{{$getpost->id}}" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
                    </td>
                </tr>

                <!-- Delete Modal -->
                <form method="GET" action="{{route('deleteorder',$getpost->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="deleteModal_{{$getpost->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Delete Slider</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this Order?</p>


                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Yes" class="btn btn-success">
                                    <input type="button" value="No" class="close btn btn-danger" data-dismiss="modal">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                <!-- Delete Modal End -->



                @endforeach
        </table>

        @if(session()->has('msg'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>{{session()->get('msg')}}</strong>
            </div>
        @endif

        {{--@if(session()->has('filter'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>{{session()->get('filter')}}</strong>
            </div>
        @endif--}}

    </div>
    @endsection