@extends('client.main')

@section('content')
    <br><br><br>
    <div class="user-content row">
        <div class="side-menu col-md-3 sol-sm-12">
            <div class="username ">
                <i class="far fa-user-circle font "></i>
                Tài khoản của <br> <span class="font" style="padding-left: 22%;">Nguyễn Đức Minh Trung</span>
            </div>
            <div class="submenu" >
                <ul>
                    <li class="subc font tab-item active " id="submenu-myprofile"><a href="index.php?quanly=user">Thông tin chung</a></li>
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
                <p class="font"><span class="font title-infor">Họ Và Tên:</span> Nguyễn Đức Minh Trung</p>
                <p class="font"><span class="font title-infor ">Email:</span> minhtrung4367@gmail.com</p>
                <p class="font"><span class="font title-infor ">Giới Tính:</span> 1</p>
                <p class="font"><span class="font title-infor">Điện Thoại:</span> 0707624367</p>
                <p class="font"><span class="font title-infor">Địa Chỉ:</span> B14/12 ấp 2 H.Bình Chánh ,tp HCM
                </p>
            </div>
            <br>
            <button type="button" class="btn btn-outline-primary font "
                onclick="document.getElementById('id01').style.display='block'">Cập Nhật Thông Tin Cá Nhân</button>

            <br>


        </div>

        <div class="container-fluid table-order col-md-9 sol-sm-12 tab-pane " id='panel-info'>
            <br>
            <div class="table-responsive-md" id="donhang" >
                <p class="font" style="font-weight: bold; font-size: large;">Các Đơn Hàng Đã Đặt:</p>
                <table class="table table-hover  table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="tr">Mã Đơn Hàng</th>
                            <th class="tr">Ngày Đặt</th>
                            <th class="tr">Tên Sản Phẩm</th>
                            <th class="tr">Tổng Tiền</th>
                            <th class="tr" style="width: 10%;">Trạng Thái Đơn Hàng</th>
                            <th class="tr">Thao Tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>

                            <td class="items id_order"><a href="index.php?quanly=user&amp;id_order=1">1 </a></td>
                            <td class="items">0000-00-00 00:00:00</td>
                            <td class="items name-product">
                                <a class="name_product_content" href="index.php?quanly=detail&amp;id=76">
                                    EMGO-VARSITY ---- Kích Thước: S ---- Số Lượng: 1 <br> </a>
                            </td>
                            <td class="items">480,000 VNĐ</td>
                            <td class="items">Đã Hoàn Thành</td>
                            <td class="items">
                            </td>
                        </tr>
                        <tr>

                            <td class="items id_order"><a href="index.php?quanly=user&amp;id_order=2">2 </a></td>
                            <td class="items">2021-05-15 11:22:30</td>
                            <td class="items name-product">
                                <a class="name_product_content" href="index.php?quanly=detail&amp;id=76">
                                    EMGO-VARSITY ---- Kích Thước: S ---- Số Lượng: 1 <br> </a>
                                <a class="name_product_content" href="index.php?quanly=detail&amp;id=47">
                                    Prive-Monogram-Cardigan ---- Kích Thước: M ---- Số Lượng: 3 <br> </a>
                            </td>
                            <td class="items">2,850,000 VNĐ</td>
                            <td class="items">Đang Xử Lý</td>
                            <td class="items">
                            </td>
                        </tr>
                        <tr>

                            <td class="items id_order"><a href="index.php?quanly=user&amp;id_order=3">3 </a></td>
                            <td class="items">2021-05-15 11:23:44</td>
                            <td class="items name-product">
                                <a class="name_product_content" href="index.php?quanly=detail&amp;id=7">
                                    HappyAniversary Special Fire ---- Kích Thước: S ---- Số Lượng: 1 <br> </a>
                            </td>
                            <td class="items">600,000 VNĐ</td>
                            <td class="items">Đang Xử Lý</td>
                            <td class="items">
                            </td>
                        </tr>
                        <tr>

                            <td class="items id_order"><a href="index.php?quanly=user&amp;id_order=4">4 </a></td>
                            <td class="items">2021-05-15 11:24:47</td>
                            <td class="items name-product">
                                <a class="name_product_content" href="index.php?quanly=detail&amp;id=26">
                                    ANGLES-RAINBOW ---- Kích Thước: M ---- Số Lượng: 2 <br> </a>
                            </td>
                            <td class="items">1,400,000 VNĐ</td>
                            <td class="items">Đang Xử Lý</td>
                            <td class="items">
                            </td>
                        </tr>
                        <tr>

                            <td class="items id_order"><a href="index.php?quanly=user&amp;id_order=6">6 </a></td>
                            <td class="items">2021-05-16 01:37:08</td>
                            <td class="items name-product">
                                <a class="name_product_content" href="index.php?quanly=detail&amp;id=31">
                                    Funny-Club ---- Kích Thước: S ---- Số Lượng: 1 <br> </a>
                            </td>
                            <td class="items">400,000 VNĐ</td>
                            <td class="items">Đang Xử Lý</td>
                            <td class="items">
                            </td>
                        </tr>
                        <tr>

                            <td class="items id_order"><a href="index.php?quanly=user&amp;id_order=7">7 </a></td>
                            <td class="items">2021-05-16 01:42:35</td>
                            <td class="items name-product">
                                <a class="name_product_content" href="index.php?quanly=detail&amp;id=7">
                                    HappyAniversary Special Fire ---- Kích Thước: S ---- Số Lượng: 1 <br> </a>
                            </td>
                            <td class="items">600,000 VNĐ</td>
                            <td class="items">Đang Xử Lý</td>
                            <td class="items">
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="information col-md-9 sol-sm-12 tab-pane" id='panel-info'>
            <div class="information-user">
                <h5 class="font title-infor">ĐỔI MẬT KHẨU </h5>
                <p class="font"><span class="font title-infor">Họ Và Tên:</span> Nguyễn Đức Minh Trung</p>
                <p class="font"><span class="font title-infor ">Email:</span> minhtrung4367@gmail.com</p>
                <p class="font"><span class="font title-infor ">Giới Tính:</span> 1</p>
                <p class="font"><span class="font title-infor">Điện Thoại:</span> 0707624367</p>
                <p class="font"><span class="font title-infor">Địa Chỉ:</span> B14/12 ấp 2 H.Bình Chánh ,tp HCM
                </p>
            </div>
            <br>
            <button type="button" class="btn btn-outline-primary font "
                onclick="document.getElementById('id01').style.display='block'">Đổi Mật Khẩu</button>

            <br>


        </div>


    </div>
    <div id="id01" class="modal">

        <form class="modal-content animate" action="./giaodien/action_user.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">×</span>
            </div>

            <div class="input-content">
                <label for="fullname"><b>Họ và Tên:</b></label>
                <input class="login-input" type="text" placeholder="VD:Nguyễn Văn A" name="fullname" id="uname"
                    required="">

                <label for="psw"><b>Mật Khẩu:</b></label>
                <input class="login-input" type="text" placeholder="Nhập Mật Khẩu:" name="psw" id="psw" required="">

                <label for="phone"><b>Số Điện Thoại:</b></label>
                <input class="login-input" type="text" placeholder="Nhập Số Điện Thoại:" name="phone" id="psw"
                    required="">

                <label for="gender"><b>Giới Tính:</b></label>
                <input class="login-input" type="text" placeholder="Nhập Giới Tính:" name="gender" id="psw" required="">

                <label for="address"><b>Địa Chỉ:</b></label>
                <input class="login-input" type="text" placeholder="Nhập Địa Chỉ:" name="address" id="psw" required="">

            </div>
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
