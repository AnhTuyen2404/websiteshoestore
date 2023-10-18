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
    <h2>Xác nhận xóa tài khoản</h2>
    <p>Bạn có chắc chắn muốn xóa tài khoản:</p>
    <p>Tên tài khoản: {{ $account->customer_name }}</p>
    <p>Số điện thoại: {{ $account->customer_phone }}</p>
    <!-- Các thông tin khác -->

    <form action="{{ route('admin.deleteAccount', ['id' => $account->customer_id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Xóa</button>
        <a href="{{ route('admin.accounts') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
