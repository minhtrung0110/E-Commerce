@extends('admin.layout.layout') 
@section('title')
{{$title}}
@endsection 
 {{-- content  --}}
 @section('infoStaff')
<a href="#" class="d-block">{{$staff->first_name }} {{ $staff->last_name }}</a>

@endsection
@section('notifications')
{{count($status)}}

@endsection
@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{-- code --}}
    @if(Session::has('success'))

      <div class="text-center">
        <p class="alert alert-success ">{{Session::get('success') }}</p>
      </div>

      @endif
    <table class="table">
      <thead>
        <tr>
          <th style="width:50px" scope="col">STT</th>
          <th scope="col">Tên Khách hàng</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Giảm giá</th>
          <th scope="col">Tổng giá chưa giảm</th>
          <th scope="col">Tổng giá đã giảm</th>
          <th scope="col">#</th>
        </tr>
        
      </thead>
      <tbody>
        @foreach ($orders as $key => $order)
        <tr>
          <th scope="row">{{++$key}}</th>
          <td>{{$order->first_name.' '.$order->last_name}}</td>
          <td>
          
            @php

              
                
                for ($i=1; $i <=count($a) ; $i++) { 
                  if($order->status_order== $i){
                    echo $a[$i];
                  }
                }
            @endphp
          </td>
          <td>{{$order->discount_value.'%'}}</td>
          <td>{{number_format($order->total_price)}}</td>
          <td>{{number_format($order->total_price -($order->total_price*($order->discount_value/100)))}}</td>
      
          <td>
            <a class="btn btn-danger btn-sm rounded-circle" href="/admin/orders/edit/{{$order->id}}">
              <i class='fas fa-edit'></i>
            </a> 
            <a class="btn btn-primary btn-sm rounded-circle" href="/admin/orders/show/{{$order->id}}">
              <i class='fa fa-exclamation-circle'></i>
            </a>
          </td>
        </tr>
            
        @endforeach

      
      </tbody>
    </table>
  </div>
@endsection