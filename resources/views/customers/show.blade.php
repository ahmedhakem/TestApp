@extends('layouts.admin')
@section('pageTitle', 'Show Customer')

@section('content')
<div class="col-lg-6 offset-md-3">
    <div class="card">
        <div class="card-header">
            Customer Information
        </div>
        <div class="card-body">
            <ul>
                <li>First Name: {{$customer->FirstName}}</li>
                <li>Last Name: {{$customer->LastName}}</li>
                <li>Shop: {{$customer->shopName}}</li>
                <li>Email: {{$customer->Email}}</li>
                <li>Phone: {{$customer->Phone}}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
