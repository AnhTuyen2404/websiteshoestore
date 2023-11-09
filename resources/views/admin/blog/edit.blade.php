@extends('admin.layouts.master')
@section('title','E-SHOP || Blog Edit')
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
    <h5 class="card-header">Edit Blog</h5>
    <div class="card-body">
      <form method="post" action="{{route('blog.update',$blog[0]->blog_id)}}">
        @csrf 
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="ten" placeholder="Enter title"  value="{{$blog[0]->blog_title}}" class="form-control">
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
          <label for="inputDesc" class="col-form-label">Nội dung</label>
          <textarea class="form-control" id="description" name="noidung">{{$blog[0]->blog_content}}</textarea>
          @error('description')
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
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush