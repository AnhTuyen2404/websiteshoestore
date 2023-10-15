
@extends('admin.layouts.master')
@section('main-content')

<div class="card">
    <h5 class="card-header">Add Category</h5>
    <div class="card-body">
      <form method="post" action="{{route('category.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Mã loại hàng<span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="ma" placeholder="Nhập mã"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Tên loại hàng</label>
          <textarea placeholder="Nhập tên"  class="form-control" id="summary" name="ten">{{old('summary')}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        {{-- {{$parent_cats}} --}}

        
        <div class="form-group">
          <label for="status" class="col-form-label">Trạng thái <span class="text-danger">*</span></label>
          <select name="trangthai" class="form-control">
              <option value="show">Show</option>
              <option value="hide">Hide</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
            <button class="btn btn-success" type="submit">Submit</button>

            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
      </form>
    </div>
</div>
<div class="content-body">
  <div class="container-fluid">
<div class="row page-titles">
<ol class="breadcrumb">
  <li class="breadcrumb-item active"><a href="javascript:void(0)">Category</a></li>
  <li class="breadcrumb-item"><a href="javascript:void(0)"> Add Category</a></li>
</ol>
      </div>
<div class="row">
<div class="col-xl-6 col-lg-12">
  <div class="card">
      <div class="card-header">
          <h4 class="card-title">Add Category</h4>
      </div>
      <div class="card-body">
          <div class="basic-form">
              <form>
                  <div class="row">
                      <div class="mb-3 col-md-6">
                          <label class="form-label">Category Code</label>
                          <input type="text" class="form-control" placeholder="Type The Code">
                      </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" placeholder="Type Name">
                    </div>
                  </div>
                  <div class="row">
                      <div class="mb-3 col-md-4">
                          <label class="form-label">Status</label>
                          <select id="inputState" class="default-select form-control wide">
                              <option selected="">Choose...</option>
                              <option>Show</option>
                              <option>Hide</option>
                          </select>
                      </div>
                  </div>
          
                  <button type="submit" class="btn btn-primary">Add </button>
                  <button type="reset" class="btn btn-primary">Reset </button>
              </form>
          </div>
      </div>
  </div>
</div>
</div>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write short description.....",
          tabsize: 2,
          height: 120
      });
    });
</script>

<script>
  $('#is_parent').change(function(){
    var is_checked=$('#is_parent').prop('checked');
    // alert(is_checked);
    if(is_checked){
      $('#parent_cat_div').addClass('d-none');
      $('#parent_cat_div').val('');
    }
    else{
      $('#parent_cat_div').removeClass('d-none');
    }
  })
</script>
@endpush