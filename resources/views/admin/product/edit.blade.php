@extends('admin.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Product</h5>
    <div class="card-body">
      <form method="post" action="{{route('product.update',$product['product'][0]->product_id)}}">
        @csrf

          <div class="form-group">
              <label for="summary" class="col-form-label">Tên sản phẩm <span class="text-danger">*</span></label>
              <textarea placeholder="Nhập tên sản phẩm" class="form-control" id="summary" name="ten">{{$product['product'][0]->product_name}}</textarea>
              @error('summary')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group">
              <label for="price" class="col-form-label">Số lượng<span class="text-danger">*</span></label>
              <input id="price" type="number" name="soluong" placeholder="Nhập số lượng sản phẩm"  value="{{$product['product'][0]->quantity}}" class="form-control">
              @error('price')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>


          <div class="form-group">
              <label for="summary" class="col-form-label">Nội dung<span class="text-danger">*</span></label>
              <textarea placeholder="Nhập nội dung sản phẩm" class="form-control" id="summary" name="noidung">{{$product['product'][0]->product_status}}</textarea>
              @error('summary')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group">
              <label for="status" class="col-form-label">Trạng thái <span class="text-danger">*</span></label>
              <select name="trangthai" class="form-control">
                  <option value="show" {{(($product['product'][0]->product_state=='show')? 'selected' : '')}}>Show</option>
                  <option value="hide" {{(($product['product'][0]->product_state=='hide')? 'selected' : '')}}>Hide</option>
              </select>
              @error('status')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group">
              <label for="price" class="col-form-label">Giá<span class="text-danger">*</span></label>
              <input id="price" type="number" name="gia" placeholder="Nhập giá"  value="{{$product['product'][0]->price}}" class="form-control">
              @error('price')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>
          {{-- {{$categories}} --}}

          <div class="form-group">
              <label for="cat_id">Category <span class="text-danger">*</span></label>
              <select name="cat_id" id="cat_id" class="form-control">
                  <option value="">--Chọn loại mặt hàng--</option>
                  @foreach($product['category'] as $key=>$cat_data)
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
        height: 150
    });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail Description.....",
          tabsize: 2,
          height: 150
      });
    });
</script>

@endpush