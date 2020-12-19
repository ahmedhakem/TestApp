@extends('layouts.admin')
@section('pageTitle', 'Show Shop')

@section('content')
<div class="col-lg-6 offset-md-3">
    <div class="card">
        <div class="card-header">
            Shop Information
        </div>
        <div class="card-body">
            <ul>
                <li>Name: {{$shop->Name}}</li>
                <li>Email: {{$shop->Email}}</li>
                <li>Logo: <img src="{{asset('storage/'. $shop->Logo)}}" class="img-fluid" width="10%"></li>
                <li>Website: {{$shop->Website}}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
