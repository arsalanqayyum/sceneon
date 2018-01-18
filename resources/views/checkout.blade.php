@extends('welcome')
@section('content')
    @if(session()->has('error'))
        <div class="alert alert-success">
            {{ session()->get('error') }}
        </div>
    @endif
{{Request::get('all')}}
    <section>
        <div class="bg">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Ready to Buy?</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi asperiores debitis, dolores ducimus eius eligendi enim eos illum ipsa, magni omnis perferendis quae quia quisquam repellat totam velit vitae.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Your Contact Information</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="div col-sm-12">
                        <form action="{{route('getout')}}" method="post">
                            <table class="table table-responsive table-bordered" >
                                <tr>
                                    <th>Name</th>
                                    <th>Last Name</th>
                                    <th>CNIC</th>
                                <tr>
                                    <td><input type="text" name="name" class="form-control" placeholder="First Nmae"></td>
                                    <td><input type="text" name="lastname" class="form-control" placeholder="Last Name"></td>
                                    <td><input type="text" name="cnic" class="form-control" placeholder="optional" maxlength="13"></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Cell</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="email" class="form-control" placeholder="emaii@example.com"></td>
                                    <td><input type="text" name="phone" class="form-control" placeholder="02135390946" maxlength="11"></td>
                                    <td><input type="text" name="cell" class="form-control" placeholder="+923001234567" minlength="11" max="13"></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="address" class="form-control" placeholder="Enter your residential address"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Place Order" class="btn btn-success"></td>
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