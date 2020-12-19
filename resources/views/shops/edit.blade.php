@extends('layouts.admin')
@section('pageTitle', 'Edit Shop')

@section('content')
    <div class="col-lg-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                Shop Information
            </div>
            <div class="card-body">
                <form action="{{route("shops.update" , $shop->id)}}" enctype="multipart/form-data" method="POST">
                    {{method_field('PUT')}}
                    @csrf

                    <div class="form-group">
                        <label class="control-label">Shop Name</label>
                        <input type="text" name="shopName" class="form-control @error('shopName') is-invalid @enderror" value="{{$shop->Name}}" required />
                        @error('shopName')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label class="control-label">Email Address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$shop->Email}}" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Website</label>
                        <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" value="{{$shop->Website}}" />
                        @error('website')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Logo</label>
                        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror"/>
                        @error('logo')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
