@extends('admin.layout.layout')
@section('title')
    {{ $title }}
@endsection

@section('main-content')

    <div class="content-wrapper">

        <div class="card card-success bordered " style="padding:1em 5em; border">
            <div class="card-header">
                <h3 class="card-title"><strong>Thêm Sản Phẩm</strong></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="" id="form-add-products" class="row">

                    <!-- text input -->
                    <div class="form-group col-sm-6">
                        <label>Họ</label>
                        <input type="text" name='first_name' id="first_name" class="form-control" placeholder="Enter ...">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group col-sm-6">
                        <label>Tên Nhân Viên</label>
                        <input type="text" name="last_name"  id="last_name" class="form-control" placeholder="Enter ...">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Chức Vụ:</label>
                        <select class="form-control" name="role_id">
                          @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Số Điện Thoại:</label>
                        <input type="text" name='phone'  id='phone' class="form-control" placeholder="Enter ...">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group col-sm-6">
                        <label>Email:</label>
                        <input type="text" name="email"  id="email" class="form-control" placeholder="Enter ...">
                        <span class="form-message"></span>
                    </div>

                    <!-- text input -->
                    <div class="form-group col-sm-6">
                        <label>Mật Khẩu:</label>
                        <input type="text" name='password' id='password' class="form-control" placeholder="Enter ...">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>Địa Chỉ:</label>
                        <input type="text" name="address"  id="address" class="form-control" placeholder="Enter ...">
                        <span class="form-message"></span>
                    </div>


                    <div class="form-group col-sm-6">
                        <label>Ngày Bắt Đầu Hợp Đồng:</label>
                        <input type="date" name='start_date' id='start_date' class="form-control" placeholder="Enter ...">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group col-sm-6">
                        <label>Ngày Kết Thúc Hợp Đồng:</label>
                        <input type="date" name="end_date"  id="end_date" class="form-control" placeholder="Enter ...">
                        <span class="form-message"></span>
                    </div>

                    <button type="submit" class="form-submit btn btn-success col-sm-6"> Thêm Nhân Viên</button>

                            @csrf
                </form>
                        <!-- /.card-body -->
                 </div>
            </div>

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
                    Validator.isRequired('#password', 'Vui lòng nhập mật khẩu'),
                    Validator.isRequired('#address', 'Vui lòng nhập địa chỉ'),
                    Validator.isRequired('#start_date', 'Vui lòng nhập ngày bắt đầu'),
                    Validator.isRequired('#end_date', 'Vui lòng nhập ngày kết thúc'),
                    Validator.isEmail('#email'),
                    Validator.isPhoneNumber('#phone'),
                    Validator.minLength('#password', 6),
                    Validator.isEndDate('#end_date', function () {
                    return document.querySelector('#form-add-products #start_date').value;
                  }, 'Hợp đồng làm việc tối thiểu 2 tuần')
                ],
                onSubmit: function (data) {    
                    $.ajax({
                    type: 'POST',
                    datatype: 'JSON',
                    data: $('#form-add-products').serialize(),
                    url: '/admin/staffs/add',
                    success: function (respond) {
                        console.log(respond.message)

                        if (respond.error !== true ) {                       
                            swal("Thêm Thành Công", "Nhân Viên Đã Được Thêm", "success");
                           setTimeout(() => {window.location="/admin/staffs/list"}, 1200);
                        } 
                        else  {
                            swal("Thêm Thất Bại", "Nhân Viên Không Được Thêm", "error");
                           
                        }
                    }
                })

                }//nếu 
                //nếu muốn submit theo hành vi mặc định của form thì rào cái này lại
            });
        });
    </script>
