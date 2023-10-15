@extends('admin.layouts.master')

@section('title','Order Detail')

@section('main-content')
    <div class="container">
        <h1 class="page-title">Chi tiết đơn hàng</h1>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="order-header">ID</th>
                    <th class="order-header">Order ID</th>
                    <th class="order-header">ID sản phẩm</th>
                    <th class="order-header">Tên sản phẩm</th>
                    <th class="order-header">Giá sản phẩm</th>
                    <th class="order-header">Số lượng</th>
                    <th class="order-header">Hình ảnh</th>
             
                </tr>
            </thead>
            <tbody id="account-list">
                @foreach ($order_dt as $dt)
                    <tr class="order-row">
                        <td>{{ $dt->order_details_id }}</td>
                        <td>{{ $dt->order_id }}</td>
                        <td>{{ $dt->product_id }}</td>
                        <td>{{ $dt->product_name }}</td>
                        <td>{{ $dt->product_price }}</td>
                        <td>{{ $dt->product_quantity }}</td>
                        <td><img src="{{asset ('client/img/shop/'.$dt->product_img)}}" style="width: 60px; height: 60px;" alt=""></td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
