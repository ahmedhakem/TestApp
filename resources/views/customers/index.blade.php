@extends('layouts.admin')
@section('pageTitle', 'All Customers')

@section('content')

    <!-- /.col-md-6 -->
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Customers</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Shop</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->FirstName}}</td>
                            <td>{{$customer->LastName}}</td>
                            <td>{{$customer->shopName}}</td>
                            <td>{{$customer->Email}}</td>
                            <td>{{$customer->Phone}}</td>
                            <td>{{$customer->created_at}}</td>
                            <td>
                                <!-- Example single danger button -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route("customers.show", $customer->id)}}">Show</a>
                                        <a class="dropdown-item" href="{{route("customers.edit", $customer->id)}}">Edit</a>
                                        <form action="{{route("customers.destroy", $customer->id)}}" method="POST">
                                            {{method_field("DELETE")}}
                                            @csrf
                                            <button class="btn btn-default" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$customers->links()}}
            </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
@endsection
