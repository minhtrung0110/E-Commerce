{{-- {{dd($products->toArray())}} --}}
@extends('admin.layout.layout')
@section('title')
    {{ $title }}
@endsection
@section('infoStaff')
    <a href="#" class="d-block">{{ $staff->first_name }} {{ $staff->last_name }}</a>
@endsection

@section('main-content')
@if(Session::has('error'))
<div class="text-center">
  <p class="alert alert-dangger">{{Session::get('error')}}</p>
</div>
@endif
  <div class="row">
    <div class="card col-md-6 card-warning pt-sm-2 pl-sm-5 pr-sm-5">
      <div class="card-header  ">
        <h2 class="card-title"><strong>Danh Sách Danh Mục Sản Phẩm</strong></h2>
    </div>
      <form action="/admin/group-products/add" method="POST" id="form-add-category "class="m-2 card-body card-add pr-sm-3em pl-sm-3em-positive" enctype="multipart/form-data">
     
        @csrf
        <div class="form-group">
          <label for="Cate_name">Tên danh mục</label>
          <input type="text" class="form-control" value="{{old('Cate_name')}}" id="Cate_name" name="Cate_name" placeholder="Tên danh mục...">
         <span class="form-message"></span>
        </div>
        <div class="form-group ">
          <label>Hình ảnh</label>
          <input type="file" name="thumb" onchange="ImagesFileAsURL('thumb','displayImg');"  id='thumb' class="form-control" >
          <span class="form-message"></span>
          <div id="displayImg">

          </div>
      </div>

        <button type="submit" class="form-submit btn btn-primary">Thêm</button>
      </form>
    </div>
    <div class="card-info card col-md-6 row">
      <div class="card-header  ">
          <h2 class="card-title"><strong>Danh Sách Danh Mục Sản Phẩm</strong></h2>
      </div>
      <div class="card-body table-responsive p-0 table-bordered" style="height: 650px;">
        <table class="table table-responsive table-head-fixed text-nowrap table-hover table-condensed"style="width:100%">
          <thead style="background:rgba(0,0,0,.05); ">
              <tr style="height:50px">
                  <th style="width:10%" scope="col">STT</th>
                  <th style="width:40%">Tên Danh Mục Sản Phẩm</th>
                  <th style="width:30%">Hình Ảnh</th>
                  <th style="width:20%">Hành Động</th>
              </tr>

          </thead>
          <tbody>
              @foreach ($categories as $key => $cate)
                  <tr>
                      <th scope="row">{{ ++$key }}</th>
                      <td>{{ $cate->name }}</td>
                      <td><a href="{{ asset('storage/categories/' . $cate->thumb) }}" target="_blank">
                              <img src="{{ asset('storage/categories/' . $cate->thumb) }}" width="100px">
                          </a></td>


                      <td>
                          <a class="btn btn-primary btn-sm" href="/admin/group-products/edit/{{ $cate->id }}">
                              <i class="fas fa-edit"></i>
                          </a>
                          <a href="#" class="btn btn-danger btn-sm"
                              onclick="removeRow({{ $cate->id }}, '/admin/group-products/destroy')">
                              <i class="fas fa-trash"></i>
                          </a>
                      </td>
                  </tr>
              @endforeach


          </tbody>
      </table>
      </div>     
  </div>
  </div>
@endsection
<script>
  const obj_category={!!json_encode($categorys)!!}
 document.addEventListener('DOMContentLoaded', function() {
     Validator({
         form: '#form-add-category',
         formGroupSelector: '.form-group',
         errorSelector: '.form-message',
         rules: [
             Validator.isRequired('#Cate_name', 'Vui lòng nhập tên danh mục'),             
             Validator.isCheck('#Cate_name',obj_category,'Tên loại sản phẩm đã tồn tại'),
             Validator.isRequired('#thumb', 'Vui lòng chọn ảnh'),
             Validator.isImage('#thumb','Hình ảnh phải là jpg,jpeg hoặc png'),
         ],

     })
 });
</script>