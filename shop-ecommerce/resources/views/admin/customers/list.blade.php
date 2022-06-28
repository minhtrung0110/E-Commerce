@extends('admin.layout.layout')
@section('title')
    {{ $title }}
@endsection

@section('main-content')
    <div class=" row">
        <div class="card col-md-12 card-warning ">

            <div class="card-body ">
                <form action="" method="post" id="form-search-staff" class=" row">
                    <div class="input-group form-group col-md-4">
                        @csrf
                        <input type="text" name="search" class="form-control float-right" placeholder="Nhập dữ liệu tìm">


                    </div>
                    <select class="form-control col-md-2" name="searchFor">
                        <option value="fullname">Tìm Theo Họ - Tên</option>
                        <option value="email">Tìm Theo Email</option>
                        <option value="phone">Tìm Theo Số Điện Thoại</option>
                        <option value="id">Tìm Theo Mã</option>
                    </select>

                        <label for="role_id" class="label-justify-center">Trạng Thái: </label>
                        <select class="form-control col-md-1" name="status">
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
                        <button class="btn btn-dark ml-5 hg-button-filter"><a href="/admin/customers/add" class="cl-white">Thêm
                               Khách Hàng </a></button>
                </form>
            </div>
        </div>
        <div class="card col-md-12 card-info">
            <!-- /.card-header -->
            <div class="card-body table-responsive table-bordered p-0" >
                <table class="table table-responsive table-head-fixed text-nowrap table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:9%">Mã</th>
                            <th style="width:20%">Họ Và Tên</th>
                            <th style="width:11%">Điện Thoại</th>
                            <th style="width:12%">Email</th>
                            <th style="width:10%">Trạng Thái</th>
                            <th style="width:20%">Hành Động</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($listCustomers) == 0)
                            <tr style="width:100%">
                                <td colspan="9" class="text-center">
                                    <h5>Không Có Khách Hàng Theo Yêu Cầu</h5>
                                </td>
                            </tr>
                        @else
                            {!! \App\Helpers\Helper::renderListViewCustomer($listCustomers) !!}
                        @endif
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
            {!! \App\Helpers\Helper::renderPopupViewItemCustomer($listCustomers) !!}

        </div>


    </div>
@endsection
