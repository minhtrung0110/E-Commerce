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
          <h1>Cập nhập trạng thái đơn hàng</h1>
      </div>
    <form action="" class="text-center" method="post">
      @if(Session::has('error'))

          <p class="alert
              {{ Session::get('alert-class', 'alert-dangger') }}">{{Session::get('error') }}</p>

      @endif  
        @csrf
        <div class="form-group">
            <label for="">Trạng thái đơn hàng</label>
            <select name="status_value" id="">
            
            <option id="" @php if($status_number == 1) echo 'selected'; @endphp value="1">Chờ xác nhận</option>
            <option @php if($status_number == 2) echo 'selected'; @endphp value="2">Đã xác nhận</option>
            <option @php if($status_number == 3) echo 'selected'; @endphp value="3">Đang giao</option>
            <option @php if($status_number == 4) echo 'selected'; @endphp value="4">Giao hàng thành công</option>
            <option @php if($status_number == 5) echo 'selected'; @endphp value="5">Hủy</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success btn-sm">Cập nhập</button>
    </form>
  </div>
@endsection