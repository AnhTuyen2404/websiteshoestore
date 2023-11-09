@extends('admin.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Order</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Order Detail</a></li>
            </ol>
        </div>
    <div class="container">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="order-header">ID</th>
                    <th class="order-header">Order ID</th>
                    <th class="order-header">Product ID</th>
                    <th class="order-header">Name</th>
                    <th class="order-header">Price</th>
                    <th class="order-header">Quantity</th>
                    <th class="order-header">Images</th>
             
                </tr>
            </thead>
            <tbody id="account-list">
                @foreach ($order_dt as $dt)
                    <tr class="order-row">
                        <td>{{ $dt->order_details_id }}</td>
                        <td>{{ $dt->order_id }}</td>
                        <td>{{ $dt->product_id }}</td>
                        <td>{{ $dt->product_name }}</td>
                        <td>{{ number_format($dt->product_price) }}</td>
                        <td>{{ $dt->product_quantity }}</td>
                        <td><img src="{{asset ('client/img/shop/'.$dt->product_img)}}" style="width: 60px; height: 60px;" alt=""></td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
