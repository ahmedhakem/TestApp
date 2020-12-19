@extends('layouts.admin')
@section('pageTitle', 'Create Customer')

@section('content')

    <!-- /.col-md-6 -->
    <div class="col-lg-6 offset-md-3">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Customer Information</h5>
            </div>
            <div class="card-body">
                <form action="{{route("customers.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="control-label">First Name</label>
                        <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" value="{{old("firstName")}}" required />
                            @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label class="control-label">Last Name</label>
                        <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" value="{{old("lastName")}}" />
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
                                <option value="{{$shop->id}}">{{$shop->Name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old("email")}}" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Phone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old("phone")}}" />
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
@endsection
