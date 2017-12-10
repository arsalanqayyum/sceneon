@extends('welcome')
@section('content')
    @if(session()->has('error'))
        <div class="alert alert-success">
            {{ session()->get('error') }}
        </div>
    @endif
{{Request::get('all')}}
    <section>
        <div class="">
            <div class="single-crumb">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>{{$total}}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="div col-sm-12">
                        <form action="{{route('getout')}}" method="post">
                            <table class="table-responsive" >
                                <tr>
                                    <td>Name</td>
                                    <td><input type="text" name="name" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" name="email" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><input type="text" name="address" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="submit" class="btn btn-success"></td>
                                </tr>


                            </table>
                            {{csrf_field()}}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection