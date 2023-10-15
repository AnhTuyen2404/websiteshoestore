@extends('admin.layouts.master')

@section('title','Order Detail')

@section('main-content')
    <div class="container">
        <h1 class="page-title">Chỉnh sửa đơn hàng</h1>
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
                <label for="order_state">Trạng thái đơn hàng:</label>
                <select id="order_state" name="order_state" class="form-control">
                    <option value="Chờ xác nhận" {{ $order->order_state === 'Chờ xác nhận' ? 'selected' : '' }}>Chờ xác nhận</option>
                    <option value="Đã xác nhận" {{ $order->order_state === 'Đã xác nhận' ? 'selected' : '' }}>Đã xác nhận</option>
                    <option value="Hủy" {{ $order->order_state === 'Hủy' ? 'selected' : '' }}>Hủy</option>
                </select>
            </div>

            <div class="form-group">
                <label for="create_date">Ngày tạo đơn hàng:</label>
                <input type="text" id="create_date" name="create_date" class="form-control" value="{{ $order->create_date }}">
            </div>

            <div class="form-group">
                <label for="total_bill">Tổng hóa đơn:</label>
                <input type="text" id="total_bill" name="total_bill" class="form-control" value="{{ $order->total_bill }}">
            </div>

            <div class="form-group">
                <label for="payment_methods">Phương thức thanh toán:</label>
                <input type="text" id="payment_methods" name="payment_methods" class="form-control" value="{{ $order->payment_methods }}">
            </div>

            <div class="form-group">
                <label for="shipping_id">Mã địa chỉ giao hàng:</label>
                <input type="text" id="shipping_id" name="shipping_id" class="form-control" value="{{ $order->shipping_id }}" readonly>
            </div>

            <!-- Thêm các trường khác tương tự ở đây -->

            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
    </div>
    <script>
        flatpickr("#create_date", {
            enableTime: false, // Đảm bảo chỉ có lựa chọn ngày, không phải ngày và giờ
            dateFormat: "Y-m-d H:i:S", // Định dạng ngày tháng năm (YYYY-MM-DD)
        });
    </script>
@endsection
