@extends('admin.layout.layout')
@section('title')
    {{ $title }}
@endsection

@section('main-content')
<script>
   var listStaffs={!!json_encode($listStaffs)!!} 
   console.log(listStaffs)
</script>
    <div class="row">
        <div class="card col-md-12 card-warning " >
          
            <div class="card-body ">
                <form action="" method="post" id="form-search-staff" class=" row">
                    <div class="input-group form-group col-md-3">
                        @csrf
                        <input type="text" name="search" class="form-control float-right" placeholder="Nhập dữ liệu tìm">
    
                                     
                    </div>
                    <select class="form-control col-md-2" name="searchFor" >
                        <option value="fullname">Tìm Theo Tên</option>
                        <option value="email">Tìm Theo Email</option>
                      <option value="phone">Tìm Theo Số Điện Thoại</option>
                    </select>
                            
                        <label for="role_id" class="label-justify-center">Chức Vụ: </label>
                        <select class="form-control col-md-1" name="role_id">
                            <option value="-1">Tất Cả</option>
                            {!! \App\Helpers\Helper::renderListRole() !!}
                        </select>
                        <label for="role_id" class="label-justify-center">Trạng Thái: </label>
                        <select class="form-control col-md-1" name="status" >
                            <option value="-1">Tất Cả</option>
                          <option value="1">Hoạt Động</option>
                          <option value="0">Vô Hiệu Hoá</option>
                        </select>

                    
                   
                    <div class="card-tools col-md-1 ">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>       
                     
                    
                    </div>
                    <button class="btn btn-dark ml-5 hg-button-filter"><a href="/admin/staffs/add"  class="cl-white">Thêm Nhân Viên </a></button>
                </form>
            </div>          
        </div>
        <div class="card col-md-12 card-info" >
            
            <div class="card-header">
                <h2 class="card-title"><strong>Danh Sách Nhân Viên</strong></h2>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-bordered" style="height: 650px;">
                <table class="table table-responsive table-head-fixed text-nowrap table-hover table-condensed"
                    >
                    <thead>
                        <tr>
                            <th style="width:9%">Mã</th>
                            <th style="width:20%">Họ Và Tên</th>
                            <th style="width:12%">Chức Vụ</th>
                            <th style="width:11%">Điện Thoại</th>
                            <th style="width:12%">Email</th>
                            <th style="width:10%">Trạng Thái</th>
                            <th style="width:20%">Hành Động</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($listStaffs) == 0)
                            <tr>
                                <td colspan="9" class="text-center">
                                    <h5>Không có nhân viên</h5>
                                </td>
                            </tr>
                        @else
                            {!! \App\Helpers\Helper::renderListViewStaff($listStaffs) !!}
                        @endif
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
            {!! \App\Helpers\Helper::renderPopupViewItemStaff($listStaffs) !!}
           
        </div>
      
       

    </div>

@endsection
