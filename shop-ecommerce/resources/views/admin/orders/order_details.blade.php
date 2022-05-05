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
  <div class="" style="background: #fff">

    <a href="{{Route('admin.orders')}}" class="btn btn-success ">Quay lại</a>
  </div>
      {{-- code --}}
      
      <div class="card card-success  " style="padding:1em 8em;min-height: ">
        
        <div class="card-header">
          <h3 class="card-title">Thông tin khách hàng</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
      
        <div class="card-body">
          <div class="">
        
              <p>TÊN : {{$orderItems[0]['first_name'].' '.$orderItems[0]['last_name']}}</p>
              <p>SỐ ĐIỆN THOẠT :{{$orderItems[0]['phone']}} </p>
              <p>EMAIL :{{$orderItems[0]['email']}} </p>
              <p>ĐỊA CHỈ :{{$orderItems[0]['address_orders']}} </p>
              <p>NGÀY ĐẶT :{{$orderItems[0]['created_at']->toDayDateTimeString()}}</p>

          </div>
        </div>
      </div>
    <div class="text-center"><h1>Chi tiết hóa đơn</h1></div>
    <table class="table ">
      <thead class="thead-dark">
        <tr>
          <th style="width:50px" scope="col">STT</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Màu</th>
          <th scope="col">Giá</th>
          <th scope="col">Kho</th>
        </tr>
        
      </thead>
      @php $sum=0;
       
      @endphp
      <tbody>
        @foreach ($orderItems as $key => $order_detail)
        <tr>
          <th scope="row">{{++$key}}</th>
          <td>{{$order_detail->name}}</td>
          <td>{{$order_detail->amount_detail}}</td>
          <td>{{$order_detail->code_color}}
        <input type="color" class="rounded-circle" value="{{$order_detail->code_color}}" Disabled name="" id="">
            </td>
          <td>{{number_format($order_detail->price)}}</td>
          <td>{{$order_detail->amount}}</td>
      @php
           
           $sum=$sum+$order_detail->price;
            
      @endphp
        
        </tr>
            
        @endforeach
        @php
        $toTal=0;
        $toTal=number_format($sum); @endphp
        <tr class="table-success">
          <th scope="row">Tổng</th>
        
          <td></td>
          <td></td>
          <td></td>
          <td>{{$toTal}}VNĐ</td>
          <td></td>
        </tr>
        
      </tbody>
  
    </table>
  </div>
  {{-- <button type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#staticBackdrop"> <i class="fa fa-info"></i> Get information
  </button>
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-body ">
                  <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                  <div class="px-4 py-5">
                      <h5 class="text-uppercase">Jonathan Adler</h5>
                      <h4 class="mt-5 theme-color mb-5">Thanks for your order</h4> <span class="theme-color">Payment Summary</span>
                      <div class="mb-3">
                          <hr class="new1">
                      </div>
                      <div class="d-flex justify-content-between"> <span class="font-weight-bold">Ether Chair(Qty:1)</span> <span class="text-muted">$1750.00</span> </div>
                      <div class="d-flex justify-content-between"> <small>Shipping</small> <small>$175.00</small> </div>
                      <div class="d-flex justify-content-between"> <small>Tax</small> <small>$200.00</small> </div>
                      <div class="d-flex justify-content-between mt-3"> <span class="font-weight-bold">Total</span> <span class="font-weight-bold theme-color">$2125.00</span> </div>
                      <div class="text-center mt-5"> <button class="btn btn-primary">Track your order</button> </div>
                  </div>
              </div>
          </div>
      </div>
  </div> --}}
@endsection