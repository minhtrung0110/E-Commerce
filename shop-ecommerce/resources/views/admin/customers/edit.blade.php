@extends('admin.layout.layout')
@section('title')
    {{ $title }}
@endsection

@section('main-content')

        <div class="card card-success  " style="padding:1em 8em;min-height: ">
            <form method="post" action="" id="form-edit-products" class="row">
                <div class="card-body card-add row col-md-10 mb-sm-4 ml-sm-5">
                    <div class="col-sm-12">
                    <h4><strong>Thông Tin Cá Nhân Của Khách Hàng</strong></h4>
                    <p>Điền thông tin cá nhân của khách hàng vào các trường sau:</p>
                    </div>
                    <div class="form-group col-sm-5">
                        <label>Họ Khách Hàng </label>
                        <input type="text" name='first_name' id="first_name" value={{$customer_edit->first_name}} class="form-control">
                        <span class="form-message"></span>
                    </div>
    
                    <div class="form-group col-sm-5">
                        <label>Tên Khách Hàng</label>
                        <input type="text" name="last_name" id="last_name" value={{$customer_edit->last_name}} class="form-control" >
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-sm-5">
                        <label>Số Điện Thoại:</label>
                        <input type="text" name='phone' id='phone' class="form-control" value={{$customer_edit->phone}}>
                        <span class="form-message"></span>
                    </div>
    
                    <div class="form-group col-sm-5">
                        <label>Email:</label>
                        <input type="text" name="email" id="email" class="form-control" value={{$customer_edit->email}}>
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-sm-5">
                        @php $genders=['Khác', 'Nữ','Nam']; @endphp
                        <label>Giới Tính</label>
                        <select class="form-control" name="gender">
                            @foreach($genders as $gender)
                            <option value="{{$gender}}"
                             {{  ($customer_edit->gender == $gender) ? 'selected' : '' }}
                            
                            >{{$gender}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-10">
                        <label>Địa Chỉ:</label>
                        <input type="text" name="address" id="address" class="form-control" value={{$customer_edit->address}} >
                        <span class="form-message"></span>
                    </div>
                </div>
               
                <div class="card-body card-add row col-md-10 ml-sm-5">
                    <div class="col-sm-12">
                        <h4><strong>Thông Tin Khách Hàng Đối Với Hệ Thống</strong></h4>
                        <p>Điền thông về mật khẩu đăng nhập và trạng thái của khách hàng đó:</p>
                        </div>
    
                   
                    <div class="form-group col-sm-12">
                        <label>Hoạt Động</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="active" name="status"   {{ $customer_edit->status=== 1 ? 'checked' : '' }}>
                            <label for="active" class="custom-control-label">Có</label>
                          
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_active" name="status"   {{ $customer_edit->status === 0 ? 'checked' : '' }}>
                            <label for="no_active" class="custom-control-label"
                          
                            >Không</label>
                        </div>
                    </div>
                    @csrf
                    <div class="col-sm-1"></div>
                    <button  onClick="backtoPage()" class="btn-cancel-add-admin col-sm-2"> Huỷ</button>
                    <div class="col-sm-2"></div>
                    <button type="submit" class="btn-add-admin col-sm-5"> Cập Nhật Thông Tin Khách Hàng</button>
                    <div class="col-sm-2"></div>
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
                    Validator.isRequired('#last_name', 'Vui lòng nhập tên Khách Hàng'),
                    Validator.isRequired('#first_name', 'Vui lòng nhập họ Khách Hàng'),
                    Validator.isRequired('#phone', 'Vui lòng nhập số điện thoại'),
                    Validator.isRequired('#email', 'Vui lòng nhập email'),
                    Validator.isRequired('#address', 'Vui lòng nhập địa chỉ'),
                    Validator.isEmail('#email'),
                    Validator.isPhoneNumber('#phone'),
                  
                ],
                onSubmit: function (data) {   
                    console.log(data); 
                    $.ajax({
                    type: 'POST',
                    datatype: 'JSON',
                    data: data,
                    url: '/admin/customers/edit/{id}',
                    success: function (respond) {
                        
                        console.log(respond.error)
                        console.log(respond.message)

                        if (respond.error === false ) {                       
                            swal("Cập Nhật Thành Công", "Khách Hàng Đã Được Cập Nhật", "success");
                           setTimeout(() => {window.location="/admin/customers/list"}, 1200);
                        } 
                        else  {
                            swal("Cập Nhật Thất Bại", "Email Đã Tồn Tại Vui Lòng Chọn Email Khác", "error")
                           
                        }
                    }
                })

                }//nếu 
                //nếu muốn submit theo hành vi mặc định của form thì rào cái này lại
            });
        });
    </script>
