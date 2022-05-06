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
    <div class="text-center">
      <h3>Danh sách khuyến mãi</h3>
    </div>
    @if(Session::has('success'))
    <div class="text-center">
      <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif
    
    <table class="table">
      <thead>
        <tr>
          <th style="width:50px" scope="col">STT</th>
          <th scope="col">Tên mã giảm</th>
          <th scope="col">phần trăm giảm</th>
          <th scope="col">Chi tiết mã giảm</th>
          <th scope="col">Ngày bắt đầu</th>
          <th scope="col">Ngày kết thúc</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">#</th>
        </tr>
        
      </thead>
      <tbody>
        @foreach ($discounts as $key => $discount)
        <tr>
          <th scope="row">{{++$key}}</th>
          <td>{{$discount->name}}</td>
          <td>{{$discount->value.'%'}}</td>
          <td>{{$discount->description}}</td>
          <td>{{$discount->start_date}}</td>
          <td>{{$discount->end_date}}</td>
          <td>{{$discount->status==1 ?'còn hoạt động':'không hoạt động'}}</td>
        
       
          <td>
        <a class="btn btn-primary btn-sm" href="/admin/discounts/edit/{{ $discount->id }}">
            <i class="fas fa-edit"></i>
        </a>
            <a href="#" class="btn btn-danger btn-sm"
              onclick="removeRow({{ $discount->id }}, '/admin/discounts/destroy')">
                <i class="fas fa-trash"></i>
            </a>
          </td>
        </tr>
            
        @endforeach

      
      </tbody>
    </table>
  </div>
@endsection 