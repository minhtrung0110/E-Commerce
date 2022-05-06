@extends('admin.layout.layout') 
@section('title')
{{$title}}
@endsection 

@section('main-content')
<div class="content-wrapper">

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Danh Sách Nhân Viên</h3>

      <div class="card-tools">
        <form action="" method="post" id="form-search-staff">
        <div class="input-group input-group-sm" style="width: 150px;">
            @csrf
            <input type="text" name="search" class="form-control float-right" placeholder="Search">
            
            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 550px;">
      <table class="table table-responsive table-head-fixed text-nowrap table-hover table-condensed" style="width:100%">
        <thead >
          <tr>
            <th style="width:9%">Mã</th>
            <th style="width:14%">Họ Tên</th>
            <th style="width:10%">Chức Vụ</th>
            <th style="width:10%">Điện Thoại</th>
            <th style="width:10%">Email</th>
            <th style="width:13%">Mật Khẩu</th>
            <th style="width:13%">Địa Chỉ</th>
            <th style="width:9%">Trạng Thái</th>
            <th style="width:10%">Hành Động</th>
          </tr>
        </thead>
        
        <tbody>
          @if(count($listStaffs)==0)
          
          <tr>
            <td colspan="9" class="text-center">
              <h5>Không có nhân viên</h5>
            </td>
          </tr>
      
        @else
        
            {!! \App\Helpers\Helper::renderListViewStaff($listStaffs)!!}
         @endif
        </tbody>
      </table>
      
    </div>
    <!-- /.card-body -->
  </div>
  
</div>

@endsection

