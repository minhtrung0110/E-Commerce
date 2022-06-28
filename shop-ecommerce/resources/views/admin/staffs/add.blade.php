@extends('admin.layout.layout')
@section('title')
    {{ $title }}
@endsection

@section('main-content')
    <div class="card card-success  " style="padding:1em 4em;min-height: ">
        <form method="post" action="" id="form-add-products" class="row ">
            <!-- text input -->
            <div class="card-body card-add row col-md-10 mb-sm-4 ml-sm-5">
                <div class="col-sm-12">
                <h4><strong>Thông Tin Cá Nhân Của Nhân Viên</strong></h4>
                <p>Điền thông tin cá nhân của nhân vào các trường sau:</p>
                </div>
                <div class="form-group col-sm-5">
                    <label>Họ Nhân Viên </label>
                    <input type="text" name='first_name' id="first_name" class="form-control" placeholder="VD: Nguyễn Văn">
                    <span class="form-message"></span>
                </div>

                <div class="form-group col-sm-5">
                    <label>Tên Nhân Viên</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="VD: An">
                    <span class="form-message"></span>
                </div>
                <div class="form-group col-sm-5">
                    <label>Số Điện Thoại:</label>
                    <input type="text" name='phone' id='phone' class="form-control" placeholder="VD: 0895367798">
                    <span class="form-message"></span>
                </div>

                <div class="form-group col-sm-5">
                    <label>Email:</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="VD: domain@email.com">
                    <span class="form-message"></span>
                </div>
                <div class="form-group col-sm-10">
                    <label>Địa Chỉ:</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="VD: 12-A, Phường An Lạc, Bình Tân, HCM">
                    <span class="form-message"></span>
                </div>
            </div>
           
            <div class="card-body card-add row col-md-10 ml-sm-5">
                <div class="col-sm-12">
                    <h4><strong>Thông Tin Nhân Viên Đối Với Hệ Thống</strong></h4>
                    <p>Điền thông về chức vụ hiện tại, thời gian hợp đồng lao động, mật khẩu đăng nhập và trạng thái của nhân viên đó:</p>
                    </div>
                <div class="form-group col-sm-5">
                    <label>Chức Vụ:</label>
                    <select class="form-control" name="role_id">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach

                    </select>
                </div>


                <!-- text input -->
                <div class="form-group col-sm-5">
                    <label>Mật Khẩu:</label>
                    <input type="password" name='password' id='password' class="form-control" placeholder="Enter ...">
                    <span class="form-message"></span>
                </div>



                <div class="form-group col-sm-5">
                    <label>Ngày Bắt Đầu Hợp Đồng:</label>
                    <input type="date" name='start_date' id='start_date' class="form-control" placeholder="Enter ...">
                    <span class="form-message"></span>
                </div>

                <div class="form-group col-sm-5">
                    <label>Ngày Kết Thúc Hợp Đồng:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Enter ...">
                    <span class="form-message"></span>
                </div>
                <div class="form-group col-sm-10">
                    <label>Hoạt Động</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="status"
                            checked="">
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="status">
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>
                <div class="col-sm-2"></div>
                @csrf
                <div class="col-sm-1"></div>
                <button  onClick="backtoPage()" class="btn-cancel-add-admin col-sm-2"> Huỷ</button>
                <div class="col-sm-2"></div>
                <button type="submit" class="btn-add-admin col-sm-4"> Thêm Nhân Viên</button>
                <div class="col-sm-2"></div>
            </div>



    
    </form>
    <!-- /.card-body -->




    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        Validator({
            form: '#form-add-products',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#last_name', 'Vui lòng nhập tên nhân viên'),
                Validator.isRequired('#first_name', 'Vui lòng nhập họ nhân viên'),
                Validator.isRequired('#phone', 'Vui lòng nhập số điện thoại'),
                Validator.isRequired('#email', 'Vui lòng nhập email'),
                Validator.isRequired('#address', 'Vui lòng nhập địa chỉ'),
                Validator.isRequired('#start_date', 'Vui lòng nhập ngày bắt đầu'),
                Validator.isRequired('#end_date', 'Vui lòng nhập ngày kết thúc'),
                Validator.isEmail('#email'),
                Validator.isPhoneNumber('#phone'),

                Validator.isEndDate('#end_date', function() {
                    return document.querySelector('#form-add-products #start_date').value;
                }, 'Hợp đồng làm việc tối thiểu 2 tuần')
            ],
            onSubmit: function(data) {
                $.ajax({
                    type: 'POST',
                    datatype: 'JSON',
                    data: $('#form-add-products').serialize(),
                    url: '/admin/staffs/add',
                    success: function(respond) {
                        console.log(respond.message)

                        if (respond.error !== true) {
                            swal("Thêm Thành Công", "Nhân Viên Đã Được Thêm",
                                "success");
                            setTimeout(() => {
                                window.location = "/admin/staffs/list"
                            }, 1200);
                        } else {
                            swal("Thêm Thất Bại", "Email Của Nhân Viên Đã Tồn Tại",
                                "error");

                        }
                    }
                })

            } //nếu 
            //nếu muốn submit theo hành vi mặc định của form thì rào cái này lại
        });
    });
</script>
