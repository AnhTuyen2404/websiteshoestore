@extends('admin.layouts.master')
@section('main-content')
@include('sweetalert::alert')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Category Option</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Category</a></li>
                </ol>
            </div>
            <div class="container">
                <h2 class="my-4">Quản lý Tài khoản</h2>
                @csrf
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

                <div class="mb-3">
                    <input type="text" id="search-input" class="form-control" placeholder="Tìm kiếm tài khoản">
                </div>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody id="account-list">
                        @foreach($accounts as $account)
                        <tr>
                            <td>{{ $account->customer_id }}</td>
                            <td>{{ $account->customer_name }}</td>
                            <td>{{ $account->customer_phone }}</td>
                            <td>{{ $account->customer_email }}</td>
                            <td>
                                <div class="status-update">
                                    <select class="form-control" id="status-update-{{ $account->customer_id }}">
                                        <option value="active" {{ $account->status === 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="locked" {{ $account->status === 'locked' ? 'selected' : '' }}>Locked</option>
                                    </select>
                                    <button class="btn btn-sm btn-success" onclick="updateStatus({{ $account->customer_id }})">Update</button>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.editAccount', ['id' => $account->customer_id]) }}" class="btn btn-sm btn-primary">Sửa</a>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $account->customer_id }})">Xóa</button>
                            </td>
                            
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    
@endsection
