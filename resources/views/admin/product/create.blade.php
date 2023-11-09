@extends('admin.layouts.master')

@section('main-content')
<div class="content-body">
  <div class="container-fluid">
<div class="row page-titles">
<ol class="breadcrumb">
  <li class="breadcrumb-item active"><a href="javascript:void(0)">Product Option</a></li>
  <li class="breadcrumb-item"><a href="javascript:void(0)">Add Product</a></li>
</ol>
</div>
<div class="card">
    <h5 class="card-header">Add Product</h5>
    <div class="card-body">
      <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Product Code <span class="text-danger">*</span></label>
          <input id="" type="text" name="code" placeholder="Enter product code"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Product Name <span class="text-danger">*</span></label>
          <textarea placeholder="Enter product name" class="form-control" id="summary" name="name">{{old('summary')}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="price" class="col-form-label">Quantity <span class="text-danger">*</span></label>
          <div class="basic-form">
              <div class="input-group mb-3">
                <span class="input-group-text">36</span>
                <input type="number" class="form-control size" name="size_36" value="0">
                <span class="input-group-text">37</span>
                <input type="number" class="form-control size" name="size_37" value="0">
                <span class="input-group-text">38</span>
                <input type="number" class="form-control size" name="size_38" value="0">
                <span class="input-group-text">39</span>
                <input type="number" class="form-control size" name="size_39" value="0">
                <span class="input-group-text">40</span>
                <input type="number" class="form-control size" name="size_40" value="0">
                <span class="input-group-text">41</span>
                <input type="number" class="form-control size" name="size_41" value="0">
                <span class="input-group-text">42</span>
                <input type="number" class="form-control size" name="size_42" value="0">
                <span class="input-group-text">43</span>
                <input type="number" class="form-control size" name="size_43" value="0">
                <span class="input-group-text">44</span>
                <input type="number" class="form-control size" name="size_44" value="0">
                <span class="input-group-text">45</span>
                <input type="number" class="form-control size" name="size_45" value="0">
              </div>
          </div>
          @error('price')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Description <span class="text-danger">*</span></label>
          <textarea placeholder="Enter product description" class="form-control" id="summary" name="description">{{old('summary')}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="show">Show</option>
            <option value="hide">Hide</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Main Image<span class="text-danger">*</span></label>
          <div class="input-group">
            <input type="file" name="image">
          </div>
          <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="price" class="col-form-label">Price <span class="text-danger">*</span></label>
          <input id="price" type="number" name="price" placeholder="Enter price"  value="{{old('price')}}" class="form-control">
          @error('price')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
              {{-- {{$categories}} --}}

        <div class="form-group">
          <label for="cat_id">Category <span class="text-danger">*</span></label>
          <select name="cat_id" id="cat_id" class="form-control">
              <option value="">--Select Category--</option>
              @foreach($categories as $key=>$cat_data)
                  <option value='{{$cat_data->category_id}}'>{{$cat_data->category_name}}</option>
              @endforeach
          </select>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write short description.....",
          tabsize: 2,
          height: 100
      });
    });

    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
    // $('select').selectpicker();

</script>

<script>
  $('#cat_id').change(function(){
    var cat_id=$(this).val();
    // alert(cat_id);
    if(cat_id !=null){
      // Ajax call
      $.ajax({
        url:"/admin/category/"+cat_id+"/child",
        data:{
          _token:"{{csrf_token()}}",
          id:cat_id
        },
        type:"POST",
        success:function(response){
          if(typeof(response) !='object'){
            response=$.parseJSON(response)
          }
          // console.log(response);
          var html_option="<option value=''>----Select sub category----</option>"
          if(response.status){
            var data=response.data;
            // alert(data);
            if(response.data){
              $('#child_cat_div').removeClass('d-none');
              $.each(data,function(id,title){
                html_option +="<option value='"+id+"'>"+title+"</option>"
              });
            }
            else{
            }
          }
          else{
            $('#child_cat_div').addClass('d-none');
          }
          $('#child_cat_id').html(html_option);
        }
      });
    }
    else{
    }
  })
</script>
@endpush