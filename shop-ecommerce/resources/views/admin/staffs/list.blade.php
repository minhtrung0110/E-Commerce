@extends('admin.layout.layout') 
@section('title')
{{$title}}
@endsection 

@section('main-content')


<div class="card table-admin-overflow ">
    <div class="card-header">
      <h3 class="card-title">Danh Sách Nhân Viên</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 550px;">
      <table class="table table-head-fixed text-nowrap">
        <thead>
          <tr>
            <th>Mã</th>
            <th>Họ Tên</th>
            <th>Chức Vụ</th>
            <th>Điện Thoại</th>
            <th>Email</th>
            <th style="width:10% ">Mật Khẩu</th>
            <th>Địa Chỉ</th>
            <th>Trạng Thái</th>
            <th>Hành Đông</th>
          </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::renderListViewStaff($listStaffs)!!}
         
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

<script >
    CKEDITOR.replace('content');
</script>