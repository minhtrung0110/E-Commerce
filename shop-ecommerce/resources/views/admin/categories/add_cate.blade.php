{{-- {{dd($products->toArray())}} --}}
@extends('admin.layout.layout') 
@section('title')
{{$title}}
@endsection 
@section('infoStaff')
<a href="#" class="d-block">{{$staff->first_name }} {{ $staff->last_name }}</a>

@endsection
 {{-- content  --}}
 
@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{-- code --}}
    <div class="text-center ">
        <h1>Thêm danh mục</h1>
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
          <label for="Cate_name">Tên danh mục</label>
          <input type="text" class="form-control" value="{{old('Cate_name')}}" id="Cate_name" name="Cate_name" placeholder="Tên danh mục...">
          @error('Cate_name')
            <span style="color:red">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group ">
          <label>Hình ảnh</label>
          <input type="file" name="thumb" onchange="ImagesFileAsURL('thumb','displayImg');"  id='thumb' class="form-control" >
          @error('thumb')
          <span style="color:red">{{$message}}</span>
          @enderror
          <div id="displayImg">

          </div>
      </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
 
  </div>
@endsection 