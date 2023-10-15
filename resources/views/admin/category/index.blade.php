@extends('admin.layouts.master')

@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Danh sách mặt hàng</h6>
            <a href="{{route('category.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(count($categories)>0)
                    <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach($categories as $category)
                            @php
                                    @endphp
                            <tr>
                                <td>{{$category->category_id}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->create_date}}</td>
                                <td>
                                    @if($category->category_state=='show')
                                        <span class="badge badge-success">{{$category->category_state}}</span>
                                    @else
                                        <span class="badge badge-warning">{{$category->category_state}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('category.edit',$category->category_id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{route('category.destroy',[$category->category_id])}}">
                                        @csrf
                                        @method('get')
                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{$category->category_id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h6 class="text-center">No Categories found!!! Please create Category</h6>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<style>
    div.dataTables_wrapper div.dataTables_paginate{
        display: none;
    }
</style>
@endpush

@push('scripts')

<!-- Page level plugins -->
<script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
<script>

    $('#banner-dataTable').DataTable( {
        "columnDefs":[
            {
                "orderable":false,
                "targets":[3,4,5]
            }
        ]
    } );

    // Sweet alert

    function deleteData(id){

    }
</script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
            var dataID=$(this).data('id');
            // alert(dataID);
            e.preventDefault();
            swal({
                title: "Bạn chắc chắn muốn xóa?",
                text: "Khi xóa dữ liệu sẻ không thể khôi phục lại được!",
                icon: "Cảnh báo",
                buttons: true,
                dangerMode: true,
            })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("Dữ liệu không bị xóa!");
                        }
                    });
        })
    })
</script>
@endpush