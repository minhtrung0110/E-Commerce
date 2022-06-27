@extends('admin.layout.layout')
@section('title')
    {{ $title }}
@endsection

@section('main-content')

        <div class="card card-success  " style="padding:1em 4em;min-height: ">
           
       
            <form method="post" action="" id="form-edit-products" class="row">
                <!-- text input -->
                <input type="hidden" class="form-control" name='id' value="{{$staff_edit->id}}">
                <div class="card-body card-add row col-md-10 mb-sm-4 ml-sm-5">
                    <div class="col-sm-12">
                    <h4><strong>Thông Tin Cá Nhân Của Nhân Viên</strong></h4>
                    <p>Điền thông tin cá nhân của nhân vào các trường sau:</p>
                    </div>
                    <div class="form-group col-sm-5">
                        <label>Họ Nhân Viên</label>
                        <input type="text" name='first_name' id="first_name" class="form-control" value="{{$staff_edit->first_name}}">
                        <span class="form-message"></span>
                    </div>
    
                    <div class="form-group col-sm-5">
                        <label>Tên Nhân Viên</label>
                        <input type="text" name="last_name"  id="last_name" class="form-control" value="{{$staff_edit->last_name}}">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-sm-5">
                        <label>Số Điện Thoại:</label>
                        <input type="text" name='phone'  id='phone' class="form-control" value="{{$staff_edit->phone}}">
                        <span class="form-message"></span>
                    </div>
    
                    <div class="form-group col-sm-5">
                        <label>Email:</label>
                        <input type="text" name="email"  id="email" class="form-control" value="{{$staff_edit->email}}">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-sm-10">
                        <label>Địa Chỉ:</label>
                        <input type="text" name="address"  id="address" class="form-control" value="{{$staff_edit->address}}">
                        <span class="form-message"></span>
                    </div>
                </div>
               
                <div class="card-body card-add row col-md-10 ml-sm-5">
                    <div class="col-sm-12">
                        <h4><strong>Thông Tin Nhân Viên Đối Với Hệ Thống</strong></h4>
                        <p>Điền thông về chức vụ hiện tại, thời gian hợp đồng lao động, mật khẩu đăng nhập và trạng thái của nhân viên đó:</p>
                        </div>                        
                    <div class="form-group col-sm-5">
                        <label>Ngày Bắt Đầu Hợp Đồng:</label>
                        <input type="date" name='start_date' id='start_date' class="form-control" value="{{$staff_edit->start_date}}">
                        <span class="form-message"></span>
                    </div>
    
                    <div class="form-group col-sm-5">
                        <label>Ngày Kết Thúc Hợp Đồng:</label>
                        <input type="date" name="end_date"  id="end_date" class="form-control" value="{{$staff_edit->end_date}}">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-sm-5">
                        <label>Chức Vụ:</label>

                        <select class="form-control" name="role_id">
                          @foreach($roles as $role)
                            <option value="{{$role->id}}"
                             {{  ($staff_edit->role_id == $role->id) ? 'selected' : '' }}
                            
                            >{{$role->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group col-sm-5">
                        <label>Hoạt Động</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="active" name="status"   {{ $staff_edit->status=== 1 ? 'checked' : '' }}>
                            <label for="active" class="custom-control-label">Có</label>
                          
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_active" name="status"   {{ $staff_edit->status === 0 ? 'checked' : '' }}>
                            <label for="no_active" class="custom-control-label"
                          
                            >Không</label>
                        </div>
                    </div>
                    @csrf
                    <br/> <br/>
                    <div class="col-sm-3"></div>
                    <button type="submit" class="btn-add-admin col-sm-5"> Cập Nhật Thông Tin Nhân Viên</button>
                    <div class="col-sm-4"></div>
                </div>
    
            </form>
           

        </div>
    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Validator({
                form: '#form-edit-products',
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
                    Validator.isEndDate('#end_date', function () {
                    return document.querySelector('#form-edit-products #start_date').value;
                  }, 'Hợp đồng làm việc tối thiểu 2 tuần')
                ],
                onSubmit: function (data) {   
                    console.log(data); 
                    $.ajax({
                    type: 'POST',
                    datatype: 'JSON',
                    data: data,
                    url: '/admin/staffs/edit/{id}',
                    success: function (respond) {
                        
                        console.log(respond.error)
                        console.log(respond.message)

                        if (respond.error === false ) {                       
                            swal("Cập Nhật Thành Công", "Nhân Viên Đã Được Cập Nhật", "success");
                           setTimeout(() => {window.location="/admin/staffs/list"}, 1200);
                        } 
                        else  {
                            swal("Cập Nhật Thất Bại", "Nhân Viên Không Được Cập Nhật", "error")
                           
                        }
                    }
                })

                }//nếu 
                //nếu muốn submit theo hành vi mặc định của form thì rào cái này lại
            });
        });
    </script>
