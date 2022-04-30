$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


 $('#btn-order').click(function() {
    console.log($('#form-add-order').serialize())
            $.ajax({
                type: 'POST',
                datatype: 'JSON',
                data: $('#form-add-order').serialize(),
                url: '/checkout',
                success: function(respond) {
                    console.log(respond.message)

                    if (respond.error !== true) {
                        swal("Đặt Hàng Thành Công", respond.message, "success");
                       // setTimeout(() => {    window.location = "/admin/staffs/list" }, 1200);
                    } else {
                        swal("Đặt Hàng Thất Bại", respond.message, "error");

                    }
                }
            })
        })