@extends('admin.layouts.master')

@section('main-content')
 <!-- DataTales Example -->
<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Product Option</a></li> 
      </ol>
</div>
    <div class="card shadow mb-4">
      <div class="row">
         <div class="col-md-12">
            @include('admin.layouts.notification')
         </div>
     </div>
    <div class="card-header">
      <h6 class="card-title"> Product List</h6>
      <a href="{{route('product.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Product</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($products)>0)
        <table class="table table-responsive-md" >
          <thead>
            <tr>
              <tr>
                <th><strong>Code Product</strong></th>
                <th><strong>Product Name</strong></th>
                <th><strong>Quantity</strong></th>
                <th><strong>Image</strong></th>
                <th><strong>Price</strong></th>
                <th><strong>Creation Date</strong></th>
                <th><strong>Category Name</strong></th>
                <th><strong>Status</strong></th>
                <th><strong>Action</strong></th>
              </tr>
              
            </tr>
          </thead>
          
          <tbody>

            @foreach($products as $product)
                <tr>
                    <td>{{$product->product_id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->quantity}}
                    </td>
                    <td>
                        @if($product->product_img)
                            <img style="width:250px;" src="{{asset ('client/img/shop/'.$product->product_img)}}" class="" style="max-width:80px" alt="{{$product->product_img}}">
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                        @endif
                    </td>

                    <td>{{number_format($product->price)}}</td>
                    <td>{{$product->create_date}}</td>
                    <td>{{$product->category_name}}</td>

                    <td>
                        @if($product->product_state=='show')
                            <span class="badge badge-success">{{$product->product_state}}</span>
                        @else
                            <span class="badge badge-warning">{{$product->product_state}}</span>
                        @endif
                    </td>
                    <td style="width: 90px;">
                        <a href="{{route('product.edit',$product->product_id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{route('product.destroy',[$product->product_id])}}">
                      @csrf
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$product->product_id}} style="height:30px;width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        @else
          <h6 class="text-center">No Products found!!! Please create Product</h6>
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
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(5);
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

      $('#product-dataTable').DataTable( {
        "scrollX": false
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[10,11,12]
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
                  title: "Xác nhận xóa?",
                  text: "Một khi xóa dữ liệu sẽ không thể khôi phục!",
                  icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush
