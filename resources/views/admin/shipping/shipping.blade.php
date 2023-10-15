@extends('admin.layouts.master')

@section('main-content')
    <div class="container">
        <h1 class="page-title">Giao Hàng</h1>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="order-header">ID Shipping</th>
                    <th class="order-header">Tên khách hàng</th>
                    <th class="order-header">Số điện thoại</th>
                    <th class="order-header">Email</th>
                    <th class="order-header">Địa chỉ</th>
                    <th class="order-header">Chức năng</th>
                </tr>
            </thead>
            <tbody id="account-list">
                @foreach ($shipping as $dt)
                    <tr class="order-row">
                        <td>{{ $dt->shipping_id }}</td>
                        <td>{{ $dt->shipping_name}}</td>
                        <td>{{ $dt->shipping_phone}}</td>
                        <td>{{ $dt->shipping_email }}</td>
                        <td>{{ $dt->shipping_address }}</td>
                        <td>
                        <a href="{{ route('shipping_edit', ['id' => $dt->shipping_id]) }}" class="btn btn-sm btn-primary">Sửa</a>
                            <form class="d-inline" action="{{ route('deleteShipping', ['id' => $dt->shipping_id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('deleteShipping', ['id' => $dt->shipping_id]) }}" onclick="return confirm('Bạn có chắc muốn xóa thông tin vận chuyển?')" class="btn btn-sm btn-danger">Xóa</a>
                         </form>
                           
                        <script>
                            document.getElementById('delete-form').addEventListener('submit', function(event) {
                                var result = confirm('Bạn có chắc muốn xóa thông tin vận chuyển?');
                                if (!result) {
                                    event.preventDefault(); // Ngăn form được submit nếu người dùng không xác nhận xóa
                                }
                            });
                        </script>

                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
