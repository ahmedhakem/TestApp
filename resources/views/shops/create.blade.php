@extends('layouts.admin')
@section('pageTitle', 'Create Shop')

@section('content')

    <!-- /.col-md-6 -->
    <div class="col-lg-6 offset-md-3">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Shop Information</h5>
            </div>
            <div class="card-body">
                <form action="{{route("shops.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="control-label">Shop Name</label>
                        <input type="text" name="shopName" class="form-control @error('shopName') is-invalid @enderror" value="{{old("shopName")}}" required />
                            @error('shopName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label class="control-label">Email Address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old("email")}}" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Website</label>
                        <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" value="{{old("website")}}" />
                        @error('website')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Logo</label>
                        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{old("logo")}}" />
                        @error('logo')
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
