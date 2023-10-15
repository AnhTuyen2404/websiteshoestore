@extends('admin.layouts.master')

@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.notification')
            </div>
        </div>
        <div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Category Option</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Category</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">List Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if(count($categories)>0)
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                            <th style="width:80px;"><strong>#</strong></th>
                                            <th><strong>CODE</strong></th>
                                            <th><strong>NAME</strong></th>
                                            <th><strong>DATE</strong></th>
                                            <th><strong>STATUS</strong></th>
                                            <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $category)
                                    @php
                                    @endphp
                                            <tr>
                                                <td></td>
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
													<div class="dropdown">
														<button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
															<svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="{{route('category.edit',$category->category_id)}}">Edit</a>
                                                            <form method="POST" action="{{route('category.destroy',[$category->category_id])}}">
                                                                @csrf
                                                                @method('get')
                                                                <a class="dropdown-item" data-id={{$category->category_id}} href="#">Delete</a>
                                                            </form>
															
														</div>
													</div>
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
                </div>
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