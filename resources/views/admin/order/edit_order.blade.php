@extends('admin.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Order</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Order Edit</a></li>
            </ol>
        </div>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('update_order', ['id' => $order->order_id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="order_state">Order State:</label>
                <select id="order_state" name="order_state" class="form-control">
                    <option value="To Pay" {{ $order->order_state === 'To Pay' ? 'selected' : '' }}>To Pay</option>
                    <option value="To Ship" {{ $order->order_state === 'To Ship' ? 'selected' : '' }}>To Ship</option>
                    <option value="To Receive" {{ $order->order_state === 'To Receive' ? 'selected' : '' }}>To Receive</option>
                    <option value="Completed" {{ $order->order_state === 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Cancelled" {{ $order->order_state === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    <option value="Return Refund" {{ $order->order_state === 'Return Refund' ? 'selected' : '' }}>Return Refund</option>
                </select>
            </div>

            <div class="form-group">
                <label for="create_date">Created Date:</label>
                <input type="text" id="create_date" name="create_date" class="form-control" value="{{ $order->create_date }}">
            </div>

            <div class="form-group">
                <label for="total_bill">Total:</label>
                <input type="text" id="total_bill" name="total_bill" class="form-control" value="{{ number_format($order->total_bill) }} vnđ">
            </div>

            <div class="form-group">
                <label for="payment_methods">Payment Methods:</label>
                <input type="text" id="payment_methods" name="payment_methods" class="form-control" value="{{ $order->payment_methods }}">
            </div>

            <div class="form-group">
                <label for="shipping_id">Delivery Address:</label>
                <input type="text" id="shipping_id" name="shipping_id" class="form-control" value="{{ $order->shipping_id }}" readonly>
            </div>

            <!-- Thêm các trường khác tương tự ở đây -->

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <script>
        flatpickr("#create_date", {
            enableTime: false, // Đảm bảo chỉ có lựa chọn ngày, không phải ngày và giờ
            dateFormat: "Y-m-d H:i:S", // Định dạng ngày tháng năm (YYYY-MM-DD)
        });
    </script>
@endsection
