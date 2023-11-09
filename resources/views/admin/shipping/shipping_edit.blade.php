@extends('admin.layouts.master')

@section('main-content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Category Option</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Category</a></li>
            </ol>
        </div>
<div class="container">
    <h1 class="page-title">Chỉnh Sửa Thông Tin Vận Chuyển</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    <form action="{{ route('updateShipping', ['id' => $id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="shipping_name">Tên người nhận:</label>
            <input type="text" name="shipping_name" class="form-control" value="{{ $ship->shipping_name }}" required>
        </div>
        <div class="form-group">
            <label for="shipping_phone">Số điện thoại:</label>
            <input type="text" name="shipping_phone" class="form-control" value="{{ $ship->shipping_phone }}" required>
        </div>
        <div class="form-group">
            <label for="shipping_email">Email:</label>
            <input type="email" name="shipping_email" class="form-control" value="{{ $ship->shipping_email }}" required>
        </div>
        <div class="form-group">
            <label for="shipping_address">Địa chỉ:</label>
            <textarea name="shipping_address" class="form-control" required>{{ $ship->shipping_address }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
    </form>
</div>
@endsection
