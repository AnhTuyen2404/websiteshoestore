@extends('admin.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Order</a></li>
            </ol>
        </div>
        <form action="{{ route('filter_orders') }}" method="GET">
            @csrf
            <label for="order_status">Filter by Order Status:</label>
            <select name="order_status" id="order_status">
                <option value="">All</option>
                <option value="Pending" >Pending</option>
                <option value="To Pay" >To Pay</option>
                <option value="To Ship">To Ship</option>
                <option value="To Receive">To Receive</option>
                <option value="Completed" >Completed</option>
                <option value="Cancelled" >Cancelled</option>
                <option value="Return Refund" >Return Refund</option>
                <!-- Thêm các trạng thái khác nếu cần -->
            </select>
            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
        </form>
    <div class="container">
        <table class="table table-bordered table-striped" id="order-table"> 
            <thead>
                <tr>
                    <th class="order-header">ID</th>
                    <th class="order-header">Order State</th>
                    <th class="order-header">Created Date</th>
                    <th class="order-header">Total</th>
                    <th class="order-header">Payment methods</th>
                    <th class="order-header">Shipping ID</th>
                    <th class="order-header">Action</th>
                </tr>
            </thead>
            <tbody id="account-list">
                @foreach ($orders as $order)
                    <tr class="order-row">
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->order_state }}</td>
                        <td>{{ $order->create_date }}</td>
                        <td>{{number_format($order->total_bill)}} vnđ</td>
                        <td>{{ $order->payment_methods }}</td>
                        <td>{{ $order->shipping_id }}</td>
                        <td>
                        <a href="{{ route('order_details', ['id' => $order->order_id]) }}" class="btn btn-sm btn-primary">Detail</a>
                        <a href="{{ route('edit_order', ['id' => $order->order_id]) }}" class="btn btn-sm btn-warning">Edit</a>  
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
@endsection
