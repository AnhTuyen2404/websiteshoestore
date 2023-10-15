@extends('admin.layouts.master')

@section('main-content')
    <div class="container">
        <h2 class="my-4">Quản lý Tài khoản</h2>
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
                    <th>Tên tài khoản</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody id="account-list">
                @foreach($accounts as $account)
                    <tr>
                        <td>{{ $account->customer_id}}</td>
                        <td>{{ $account->customer_name}}</td>
                        <td>{{ $account->customer_phone}}</td>
                        <td>{{ $account->customer_email}}</td>
                        <td>{{ $account->customer_password}}</td>
                        <td>
                            <a href="{{ route('admin.editAccount', ['id' => $account->customer_id]) }}" class="btn btn-sm btn-primary">Sửa</a>
                            <form class="d-inline" action="{{ route('admin.deleteAccount', ['id' => $account->customer_id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('admin.showDeleteConfirmation', ['id' => $account->customer_id]) }}" class="btn btn-sm btn-danger">Xóa</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('search-input').addEventListener('keyup', function() {
            const query = this.value.toLowerCase();
            const accountList = document.getElementById('account-list');
            const rows = accountList.getElementsByTagName('tr');
            
            for (let row of rows) {
                const name = row.cells[1].textContent.toLowerCase();
                if (name.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    </script>
@endsection
