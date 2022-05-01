$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// CART
 $('#btn-order').click(function() {
    console.log($('#form-add-order').serialize())
            $.ajax({
                type: 'POST',
                datatype: 'JSON',
                data: $('#form-add-order').serialize(),
                url: '/carts',
                success: function(respond) {
                    console.log(respond.message)

                    if (respond.error !== true) {
                       // swal("Đặt Hàng Thành Công", respond.message, "success");
                       setTimeout(() => {    window.location = "/checkout" }, 100);
                    } else {
                        swal("Đặt Hàng Thất Bại", respond.message, "error");

                    }
                }
            })
        })
// Check Out
document.addEventListener('DOMContentLoaded', function() {
    
            Validator({
                form: '#form-checkout',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                   Validator.isRequired('#last_name', 'Vui lòng nhập tên nhân viên'),
                    Validator.isRequired('#first_name', 'Vui lòng nhập họ nhân viên'),
                    Validator.isRequired('#phone', 'Vui lòng nhập số điện thoại'),
                    Validator.isRequired('#email', 'Vui lòng nhập email'),
                    Validator.isRequired('#wards', 'Vui lòng nhập xã/phường'),
                    Validator.isRequired('#provinces', 'Vui lòng chọn thành phố/tỉnh'),
                    Validator.isRequired('#district', 'Vui lòng chọn quận/huyện'),
                    Validator.isRequired('#address', 'Vui lòng nhập địa chỉ'),                   
                    Validator.isEmail('#email'),
                    Validator.isPhoneNumber('#phone'),
                 
                ],
                /*onSubmit: function (data) {    
                   
                    console.log(data);
                }*/
            });
});
        