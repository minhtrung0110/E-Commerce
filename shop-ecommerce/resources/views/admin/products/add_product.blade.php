@extends('admin.layout.layout') 
@section('title')
{{$title}}
@endsection 
@section('infoStaff')
<a href="#" class="d-block">{{$staff->first_name }} {{ $staff->last_name }}</a>

@endsection

@section('js-ckeditor')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js">
</script>
<script>
    CKEDITOR.replace( 'description' );

</script>
@endsection
 {{-- content  --}}
 
@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{-- code --}}
      <div class="text-center ">
        <h1>Thêm sản phẩm</h1>
      </div>
    
<<<<<<< HEAD
    <form action="" method="POST" class="m-2">
=======
    <form action="/add" method="POST" class="m-2">
>>>>>>> 0348485b8de62b3c193e91175fac8bb28aced3f1
      @include('admin.user.messeger')
        @csrf
        <div class="form-group">
          <label for="product_name">Tên sản phẩm</label>
          <input type="text" class="form-control" value="{{old('Product_name')}}" id="product_name" name="Product_name" placeholder="Tên sản phẩm...">
          @error('Product_name')
            <span style="color:red">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label >Tên danh mục</label>
          <select class="form-control" id="category" name="Category" value="{{old('Category')}}">
              @foreach ($categorys as $key => $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
                  
              @endforeach
          </select>
          @error('Category')
          <span style="color:red">{{$message}}</span>
          @enderror
        </div>

        
        <div class="form-group">
         
            <div class="row">
                <div class="col-sm-4">
                    <label for="code_color">Màu</label>
                     <input type="color" class="form-control" id="code_color" value="{{old('Code_color')}}" name="Code_color" >
                     @error('Code_color')
                     <span style="color:red">{{$message}}</span>
                   @enderror
                </div>
                <div class="col-sm-4">
                    <label for="amount">Số lượng</label>
                    <input type="text" class="form-control" id="amount" value="{{old('Amount')}}" placeholder="Số lượng..." name="Amount" >
                    @error('Amount')
                    <span style="color:red">{{$message}}</span>
                  @enderror
                 </div>
                 <div class="col-sm-4">
                    <label for="price">Giá</label>
                    <input type="text" class="form-control" id="price" value="{{old('Price')}}" placeholder="Giá sản phẩm..." name="Price" >
                    @error('Price')
                    <span style="color:red">{{$message}}</span>
                  @enderror
                 </div>
            </div>
            </div>

        <div class="form-group">
            <label for="description">Chi tiết sản phẩm</label>
            <textarea  class="form-control" id="description" name="Description" >{{old('Description')}}</textarea>
        </div>
        <div class="form-group">
            <label for="">Kích hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" value="1" id="active" name="active" checked="">
                <label for="active" class="custom-control-label">Có</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" value="0" id="no_active" name="active" >
                <label for="no_active" class="custom-control-label">Không</label>
              </div>
        </div>

          <div class="form-group">
            <label for="img_link">Hình ảnh</label>
            <input type="file" multiple="multiple" value="{{old('Img_link')}}" class="form-control" id="img_link" name="Img_link"  placeholder="" >
            @error('Img_link')
            <span style="color:red">{{$message}}</span>
          @enderror
          </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
  </div>
@endsection 
