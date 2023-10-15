@extends('admin.layouts.master')

@section('title','Order Detail')

@section('main-content')
    <div class="container">
        <h1 class="page-title">Danh sách đơn hàng</h1>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="order-header">ID</th>
                    <th class="order-header">Trạng thái</th>
                    <th class="order-header">Ngày tạo</th>
                    <th class="order-header">Tổng giá</th>
                    <th class="order-header">Phương thức thanh toán</th>
                    <th class="order-header">Shipping ID</th>
                    <th class="order-header">Thao tác</th>
                </tr>
            </thead>
            <tbody id="account-list">
                @foreach ($orders as $order)
                    <tr class="order-row">
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->order_state }}</td>
                        <td>{{ $order->create_date }}</td>
                        <td>{{ $order->total_bill }}</td>
                        <td>{{ $order->payment_methods }}</td>
                        <td>{{ $order->shipping_id }}</td>
                       <td><a href="{{ route('order_details', ['id' => $order->order_id]) }}" class="btn btn-sm btn-primary">Chi tiết</a>
                       <a href="{{ route('edit_order', ['id' => $order->order_id]) }}" class="btn btn-sm btn-warning">Chỉnh sửa</a>  
                    </td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
