@extends('admin.layout.layout') 
@section('title')
{{$title}}
@endsection 
 {{-- content  --}}
 @section('infoStaff')
<a href="#" class="d-block">{{$staff->first_name }} {{ $staff->last_name }}</a>

@endsection
@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      {{-- code --}}
      <a href="/admin/orders/list" class="btn btn-success">Quay lại</a>
    <div class="text-center">
        <h1>Thông tin khách hàng</h1>
        <p>Tên: {{$orderItems[0]['first_name'].' '.$orderItems[0]['last_name']}}</p>
        <p>Số điện thoạt:{{$orderItems[0]['phone']}} </p>
        <p>Email:{{$orderItems[0]['email']}} </p>
        <p>Địa chỉ:{{$orderItems[0]['address']}} </p>
        <p>Ngày đặt :{{$orderItems[0]['created_at']}}</p>

    </div>
    <div class="text-center"><h1>Chi tiết hóa đơn</h1></div>
    <table class="table">
      <thead>
        <tr>
          <th style="width:50px" scope="col">STT</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Màu</th>
          <th scope="col">Giá</th>
          <th scope="col">Kho</th>
        </tr>
        
      </thead>
      <tbody>
        @foreach ($orderItems as $key => $order_detail)
        <tr>
          <th scope="row">{{++$key}}</th>
          <td>{{$order_detail->name}}</td>
          <td>{{$order_detail->amount_detail}}</td>
          <td>{{$order_detail->code_color}}
        <input type="color" value="{{$order_detail->code_color}}" Disabled name="" id="">
            </td>
          <td>{{$order_detail->price}}</td>
          <td>{{$order_detail->amount}}</td>
      
        
        </tr>
            
        @endforeach

      
      </tbody>
    </table>
  </div>
@endsection