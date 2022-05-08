@extends('client.main')

@section('content')
    <br><br><br>
    <div class="user-content row">
        <div class="side-menu col-md-3 sol-sm-12">
            <div class="username ">
                <i class="far fa-user-circle font "></i>
                Tài khoản của <br> <span class="font" style="padding-left: 22%;">{{ $customer->first_name }}
                    {{ $customer->last_name }}</span>
            </div>
            <div class="submenu">
                <ul>
                    <li class="subc font tab-item active " id="submenu-myprofile">Thông tin
                            chung</li>
                    <li class="subc font tab-item " id="submenu-myprofile">Đơn hàng
                        của tôi</li>
                    <li class="subc font tab-item " id="submenu-myprofile">Đổi Mật
                        Khẩu</li>


                </ul>
            </div>
        </div>
        <div class="information col-md-9 sol-sm-12 tab-pane active" id='panel-info'>
            <div class="information-user">
                <h5 class="font title-infor">THÔNG TIN CỦA TÔI </h5>
                <p class="font"><span class="font title-infor">Họ Và Tên:</span> {{ $customer->first_name }}
                    {{ $customer->last_name }}</p>
                <p class="font"><span class="font title-infor ">Email:</span> {{ $customer->email }}</p>
                <p class="font"><span class="font title-infor ">Giới Tính:</span> {{ $customer->gender }}</p>
                <p class="font"><span class="font title-infor">Điện Thoại:</span>{{ $customer->phone }}</p>
                <p class="font"><span class="font title-infor">Địa Chỉ:</span> {{ $customer->address }} </p>
            </div>
            <br>
            <button type="button" class="btn btn-outline-primary font "
                onclick="document.getElementById('id01').style.display='block'">Cập Nhật Thông Tin Cá Nhân</button>

            <br>


        </div>

        <div class="container-fluid table-order col-md-9 sol-sm-12 tab-pane " id='panel-info'>
            <br>
            <div class="table-responsive-md" id="donhang">
                <p class="font" style="font-weight: bold; font-size: large;">Các Đơn Hàng Đã Đặt:</p>
                <table class="table table-hover  table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="tr">Mã Đơn Hàng</th>
                            <th class="tr">Ngày Đặt</th>
                            <th class="tr">Tên Sản Phẩm</th>
                            <th class="tr">Tổng Tiền</th>
                            <th class="tr">Phương Thức Thanh Toán</th>
                            <th class="tr" style="width: 10%;">Trạng Thái Đơn Hàng</th>                            
                        </tr>
                    </thead>

                    <tbody>

                        {!! \App\Helpers\Helper::renderListOrderCustomer($order_customer) !!}
                    </tbody>
                </table>
            </div>
        </div>
        <div class=" col-md-9 sol-sm-12 tab-pane row" id='panel-info'>
            <div class="col-md-2"></div>
            <form class=" col-md-6 col-sm-12 bordered" method="post" action="" id="form-change-password">
                <input type="hidden" name="customer_id" value="{{ $customer->id }}" class="form-control">
                <div class="form-group-change-password">
                    <label for="old_password" class="form-label">Mật Khẩu Hiện Tại</label>
                    <input id="old_password" name="old_password" type="text" placeholder="VD: 123456"
                        class="form-control">
                    <span class="form-message"></span>
                </div>
                <div class="form-group-change-password">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                    <span class="form-message"></span>
                </div>

                <div class="form-group-change-password">
                    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                    <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu"
                        type="password" class="form-control">
                    <span class="form-message"></span>
                </div>
                @csrf
                <button type="submit" class="btn btn-outline-primary font ">Đổi Mật Khẩu</button>

            </form>


            <br>


        </div>


    </div>
    <div id="id01" class="modal" style="z-index:12">

        <form class="modal-content animate" action="/myprofile/store" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">×</span>
            </div>

            <div class="input-content">
                <input type="hidden" name="customer_id" value="{{ $customer->id }}" class="form-control">
                <label for="fullname"><b>Họ Khách Hàng:</b></label>
                <input class="login-input" type="text" placeholder="VD:Nguyễn Văn A" name="first_name" id="uname"
                    value="{{ $customer->first_name }} " required="">
                <label for="fullname"><b>Tên Khách Hàng:</b></label>
                <input class="login-input" type="text" placeholder="VD:Nguyễn Văn A" name="last_name" id="uname"
                    value="{{ $customer->last_name }}" required="">
                <label for="phone"><b>Số Điện Thoại:</b></label>
                <input class="login-input" type="text" placeholder="Nhập Số Điện Thoại:" name="phone" id="psw"
                    value="{{ $customer->phone }}" required="">

                <label for="gender"><b>Giới Tính:</b></label>
                <input class="login-input" type="text" placeholder="Nhập Giới Tính:" name="gender" id="psw" required=""
                    value="{{ $customer->gender }}">

                <label for="address"><b>Địa Chỉ:</b></label>
                <textarea class="login-input" name="address" id="psw">{{ $customer->address }}</textarea>

            </div>
            @csrf
            <div class="group-button row">
                <div class="col-md-2 col-sm-0"></div>
                <button type="button" class="btn btn-outline-danger col-md-3"
                    onclick="document.getElementById('id01').style.display='none'">Huỷ</button>
                <div class="col-md-2 col-sm-0"></div>
                <button type="submit" class="btn btn-success col-md-3">Cập Nhật</button>
                <div class="col-md-2 col-sm-0"></div>
            </div>
        </form>
    </div>
@endsection

