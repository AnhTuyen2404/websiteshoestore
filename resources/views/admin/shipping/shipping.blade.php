@extends('admin.layouts.master')

@section('main-content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Shipping</a></li>
            </ol>
        </div>
    <div class="container">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="order-header">ID Shipping</th>
                    <th class="order-header">Customer Name</th>
                    <th class="order-header">Phone</th>
                    <th class="order-header">Email</th>
                    <th class="order-header">Address</th>
                    <th class="order-header">Feature</th>
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
                        <a href="{{ route('shipping_edit', ['id' => $dt->shipping_id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form class="d-inline" action="{{ route('deleteShipping', ['id' => $dt->shipping_id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('deleteShipping', ['id' => $dt->shipping_id]) }}" onclick="return confirm('Are you sure you want to delete shipping information?')" class="btn btn-sm btn-danger">Delete</a>
                         </form>
                           
                        <script>
                            document.getElementById('delete-form').addEventListener('submit', function(event) {
                                var result = confirm('Are you sure you want to delete the activity information?');
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
