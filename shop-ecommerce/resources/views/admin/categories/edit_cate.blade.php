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
        <h1>Sửa danh mục</h1>
      </div>
    
    <form action="" method="POST" class="m-2">
      @include('admin.user.messeger')
        @csrf
        <div class="form-group">
          <label for="Cate_name">Tên danh mục</label>
          <input type="text" class="form-control" value="{{$cate_name}}" id="Cate_name" name="Cate_name" placeholder="Tên danh mục...">
          @error('Cate_name')
            <span style="color:red">{{$message}}</span>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhập</button>
      </form>
 
  </div>
@endsection 