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
        <h2 class="my-4">Sửa Tài khoản #{{ $account->customer_name }}</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.updateAccount', ['id' => $account->customer_id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer_name">Tên khách hàng</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $account->customer_name }}">
            </div>
            <br>
            <div class="form-group">
                <label for="customer_phone">Số điện thoại</label>
                <input type="text" class="form-control" id="customer_phone" name="customer_phone" value="{{ $account->customer_phone }}">
            </div>
            <br>
            <div class="form-group">
                <label for="customer_email">Email</label>
                <input type="email" class="form-control" id="customer_email" name="customer_email" value="{{ $account->customer_email }}">
            </div>
            <br>
            <div class="form-group">
                <label for="customer_password">Mật khẩu</label>
                <input type="text" class="form-control" id="customer_password" name="customer_password" value="{{ $account->customer_password }}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection

