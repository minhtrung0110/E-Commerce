
 @extends('admin.layout.layout') 
@section('title')
{{$title}}
@endsection 
@section('infoStaff')
<a href="#" class="d-block">{{$staff->first_name }} {{ $staff->last_name }}</a>

@endsection

@section('js-ckeditor')
<script src="{{asset('ckeditor/ckeditor.js')}}">
</script>
<script>
    CKEDITOR.replace( 'description' );

</script>
@endsection
 {{-- content  --}}
 
@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{-- code --}}<a href="/admin/products/list" class="btn btn-success">Quay lại</a>
      <div class="text-center ">
        <h1>Thêm sản phẩm</h1>
      </div>
    
      @if(Session::has('error'))
      <div class="text-center">
        <p class="alert alert-dangger">{{Session::get('error')}}</p>
      </div>
      @endif
    <form action="" method="POST" class="m-2" enctype="multipart/form-data">
      @include('admin.user.messeger')
        @csrf
        <div class="form-group">
          <label for="product_name">Cập nhập sản phẩm</label>
          <input type="text" class="form-control" value="{{$product[0]['name_product']}}" id="product_name" name="Product_name" placeholder="Tên sản phẩm...">
          @error('Product_name')
            <span style="color:red">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label  >Tên danh mục</label>
          <select class="form-control" name="Category">
            @foreach ($categorys as $category)
            <option value="{{$category->id}}"{{$product[0]['cate_id']==$category->id ?'selected': ''}}>{{$category->name}}</option>
                
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
                     <input type="color" class="form-control" id="code_color" value="{{$product[0]['code_color']}}" name="Code_color" >
                     @error('Code_color')
                     <span style="color:red">{{$message}}</span>
                   @enderror
                </div>
                <div class="col-sm-4">
                    <label for="amount">Số lượng</label>
                    <input type="text" class="form-control" id="amount" value="{{$product[0]['amount']}}" placeholder="Số lượng..." name="Amount" >
                    @error('Amount')
                    <span style="color:red">{{$message}}</span>
                  @enderror
                 </div>
                 <div class="col-sm-4">
                    <label for="price">Giá</label>
                    <input type="text" class="form-control" id="price" value="{{$product[0]['price']}}" placeholder="Giá sản phẩm..." name="Price" >
                    @error('Price')
                    <span style="color:red">{{$message}}</span>
                  @enderror
                 </div>
            </div>
            </div>

        <div class="form-group">
            <label for="description">Chi tiết sản phẩm</label>
            <textarea  class="form-control" id="description" name="Description" >{{$product[0]['description']}}</textarea>
        </div>
        <div class="form-group">
            <label>Kích hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                    {{ $product[0]['active'] == 1 ? ' checked=""' : '' }}>
                <label for="active" class="custom-control-label">có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                    {{ $product[0]['active'] == 0 ? ' checked=""' : '' }}>
                <label for="no_active" class="custom-control-label">Không</label>
            </div>
        </div>
        
          <div class="form-group">
            <label for="img_link">Hình ảnh</label>
            <input type="file"  value="{{$thums}}" onchange="ImagesFileAsURL('img_link','displayImg');" class="form-control" id="img_link" name="Img_link"  >
            <div id="displayImg">
              <img width="100px" src="" alt="">
            </div>
            @error('Img_link')
            <span style="color:red">{{$message}}</span>
          @enderror
          </div>
        <button type="submit" class="btn btn-primary">Cập nhập</button>
      </form>
  </div>
@endsection 
