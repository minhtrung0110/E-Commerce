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
    <a href="{{Route('admin.discount.list')}}" class="btn btn-success">Quay lại</a>
      <div class="text-center">
          <h1>Thêm mã giảm giá</h1>
      </div>
    
    @if(Session::has('error'))
    <div class="text-center">
      <p class="alert alert-dangger">{{Session::get('error')}}</p>
    </div>
    @endif
    <form action="" method="POST" class="m-2">
        @include('admin.user.messeger')
        
          @csrf
          <div class="form-group">
            <label for="Dis_name">Tên mã giảm</label>
            <input type="text" class="form-control" value="{{old('dis_name')}}" id="Dis_name" name="dis_name" placeholder="Nhập tên mã giảm..." >
            @error('dis_name')
              <span style="color:red">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="Dis_value">Phần trăm giảm</label>
            <input type="text" class="form-control" value="{{old('dis_value')}}" id="Dis_value" name="dis_value" placeholder="Nhập phần trăm giảm..." >
            @error('dis_value')
              <span style="color:red">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="Dis_description">Chi tiết mã giảm</label>
            <input type="text" class="form-control" value="{{old('dis_description')}}" id="Dis_description" name="dis_description" placeholder="Nhập chi tiết mã giảm..." >
            @error('dis_description')
              <span style="color:red">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="Start_date">Thời gian bắt đầu</label>
            <input type="date" class="form-control" value="{{old('start_date')}}" id="Start_date" name="start_date" placeholder="Nhập ngày bất đầu...">
            @error('start_date')
              <span style="color:red">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="End_date">Thời gian kết thúc</label>
            <input type="date" class="form-control" value="{{old('end_date')}}" id="End_date" name="end_date" placeholder="Nhập ngày kết thúc..." >
            @error('end_date')
              <span style="color:red">{{$message}}</span>
            @enderror
          </div>


          <div class="form-group">
            <label>Trạng thái</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="status" name="status" checked="">
                <label for="status" class="custom-control-label">Còn hoạt động</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_status" name="status">
                <label for="no_status" class="custom-control-label">Không hoạt động</label>
            </div>
        </div>
          <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
  </div>
@endsection 