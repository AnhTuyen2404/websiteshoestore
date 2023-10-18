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
<div class="card">
    <h5 class="card-header">Edit Category</h5>
    <div class="card-body">
      <form method="post" action="{{route('category.update',$category[0]->category_id)}}">
          {{csrf_field()}}
        <div class="form-group">
          <label for="summary" class="col-form-label">Name</label>
          <textarea class="form-control" id="summary" name="ten">{{$category[0]->category_name}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        {{-- {{$parent_cats}} --}}
        {{-- {{$category}} --}}

        
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="trangthai" class="form-control">
              <option value="show" {{(($category[0]->category_state=='show')? 'selected' : '')}}>Show</option>
              <option value="hide" {{(($category[0]->category_state=='hide')? 'selected' : '')}}>Hide</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
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
        height: 150
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