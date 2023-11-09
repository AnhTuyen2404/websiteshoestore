@extends('admin.layouts.master')

@section('title','E-SHOP || Blog Create')

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
    <h5 class="card-header">Add Blog</h5>
    <div class="card-body">
      <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Id blog<span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="blog_id" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

          <div class="form-group">
              <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
              <input id="inputTitle" type="text" name="blog_title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
              @error('title')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

        <div class="form-group">
          <label for="inputDesc" class="col-form-label">Nội dung</label>
          <textarea class="form-control" id="description" name="blog_content">{{old('description')}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
        <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="file" name="image">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
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

@endpush