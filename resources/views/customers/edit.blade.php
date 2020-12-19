@extends('layouts.admin')
@section('pageTitle', 'Edit Customer')

@section('content')
    <div class="col-lg-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                Customer Information
            </div>
            <div class="card-body">
                <form action="{{route("customers.update" , $customer->id)}}" method="POST">
                    {{method_field('PUT')}}
                    @csrf

                    <div class="form-group">
                        <label class="control-label">First Name</label>
                        <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" value="{{$customer->FirstName}}" required />
                        @error('firstName')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label class="control-label">Last Name</label>
                        <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" value="{{$customer->LastName}}" />
                        @error('lastName')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Shop</label>
                        <select class="form-control" name="shop">
                            @foreach($shops as $shop)
                                <option value="{{$shop->id}}" {{$customer->shopID == $shop->id ? "selected" : ""}}>{{$shop->Name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$customer->Email}}" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Phone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$customer->Phone}}" />
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
            </div>
        </div>
    </div>
@endsection
