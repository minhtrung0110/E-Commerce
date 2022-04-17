$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//Login_Admin

function showValidate(input) {
    var thisAlert = $(input).parent();

    $(thisAlert).addClass('alert-error');
}

function hideValidate(input) {
    var thisAlert = $(input).parent();

    $(thisAlert).removeClass('alert-error');
}
// focus ẩn message error
$('.validate-form .input100').each(function(){
    $(this).focus(function(){
       hideValidate(this);
    });
});
$(document).ready(function(){

    //ONCHANGE  2 cái đều phải có
    $('#form-login-admin').change(function () {
                $.ajax({
                type: 'POST',
                datatype: 'JSON',
                data: $('#form-login-admin').serialize(),
                url: '/admin/user/login/store',
                success: function (respond) {
                    
                    if (respond.error === true) {                       
                        if(respond.fail_node == 'email') {
                           let input=document.querySelector('input[type=email]');
                           showValidate(input)
                        }  
                        else if(respond.fail_node == 'password') {
                            let input=document.querySelector('input[type=password]');
                            showValidate(input)
                           
                        }
                    } 
                }
            })
    })
    // ONCLICK 2 cái đều phải có
    $('#btn-form-login').click(function () {
                  $.ajax({
                  type: 'POST',
                  datatype: 'JSON',
                  data: $('#form-login-admin').serialize(),
                  url: '/admin/user/login/store',
                  success: function (respond) {
                      
                      if (respond.error === true) {                       
                          if(respond.fail_node == 'email') {
                             let input=document.querySelector('input[type=email]');
                             showValidate(input)
                          }  
                          else if(respond.fail_node == 'password') {
                              let input=document.querySelector('input[type=password]');
                              showValidate(input)
                          }
                      } else {
                          console.log(respond.fail_node);
                          if(respond.fail_node == null)   alert(respond.message)
                          window.location="/admin"
                      }
                  }
              })
      })
})
