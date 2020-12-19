@extends('layouts.admin')
@section('pageTitle', 'All Shops')

@section('content')

    <!-- /.col-md-6 -->
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Shops</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width: 9em">Logo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shops as $shop)
                        <tr>
                            <th><img src="{{asset('storage/'. $shop->Logo)}}" width="70%"></th>
                            <td>{{$shop->Name}}</td>
                            <td>{{$shop->Email}}</td>
                            <td>{{$shop->Website}}</td>
                            <td>{{$shop->created_at}}</td>
                            <td>
                                <!-- Example single danger button -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route("shops.show", $shop->id)}}">Show</a>
                                        <a class="dropdown-item" href="{{route("shops.edit", $shop->id)}}">Edit</a>
                                        <form action="{{route("shops.destroy", $shop->id)}}" method="POST">
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
            </div>
            {{$shops->links()}}
        </div>
    </div>
    <!-- /.col-md-6 -->
@endsection
