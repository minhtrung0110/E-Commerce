@extends('admin.layout.layout') 
@section('title')
{{$title}}
@endsection 
 {{-- content  --}}
 @section('infoStaff')
<a href="#" class="d-block">{{$staff->first_name }} {{ $staff->last_name }}</a>

@endsection
@section('notifications')
{{-- {{count($status)}} --}}

@endsection
@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{-- code --}}
    <div class="text-center">
      <h3>Danh sách đơn hàng</h3>
      <div class="card-tools">
        <div class="input-group input-group-sm search-input" style="width: 150px;">
          <form action="" method="post" id="form-search-order">

              <div class="input-group-append">
                  <Select style="width:150px" value="" name="status">
                      <option @php if($status==0) echo 'selected' @endphp value="0">ALL</option>
                      @php
                      for($i=1;$i<=count($a);$i++){
                        $selected='';
                        if($status==$i){
                          $selected='selected';
                        }
                       echo "<option ".$selected." value=".$i.">".$a[$i]."</option>";
                      }
                  @endphp
                  </Select>
                  @csrf
                <button id="search_order" type="submit" class="btn btn-default">
                  <i class="fa fa-filter"></i>
                </button>
              </div>
          </form>

        </div>
      </div>
    </div>
    
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
          <th scope="col">Ngày đặt</th>
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
          <td>{{$order->created_at->toDateString()}}</td>
      
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