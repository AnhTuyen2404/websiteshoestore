@extends('admin.layouts.master')
@section('main-content')
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Coupon Option</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Coupon</a></li>
                </ol>
    </div>
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Coupon List
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           

            <th>Discount Name</th>
            <th>Discount Code</th>
            <th>Discount Quantity</th>
            <th>Discount Condition</th>
            <th>Discount Amount</th>

          
            
           
          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $key => $cou)
          <tr>
          
            <td>{{ $cou->coupon_name }}</td>
            <td>{{ $cou->coupon_code }}</td>
            <td>{{ $cou->coupon_time }}</td>
            <td><span class="text-ellipsis">
              
               <?php if ($cou->coupon_condition == 1): ?>
                  Discount by %
              <?php else: ?>  
                  Discount by amount
              <?php endif; ?>
               
  
            </span>
          </td>
             <td><span class="text-ellipsis">
              <?php
               if($cou->coupon_condition==1){
                ?>
                Discount {{$cou->coupon_number}} %
                <?php
                 }else{
                ?>  
                Discount {{number_format($cou->coupon_number)}} vnđ
                <?php
               }
              ?>
            </span></td>
           
            <td>
             
              <a onclick="return confirm('Bạn có chắc là muốn xóa mã này ko?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{-- <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
             {!!$coupon->links()!!}
          </ul>
        </div>
      </div>
    </footer> --}}
  </div>
</div>
@endsection