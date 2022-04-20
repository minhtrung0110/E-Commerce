<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng Nhập</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="{{asset('template/images/icons/favicon.ico')}}"/>
        <link rel="stylesheet"href="{{asset('template/css/login_style.css')}}">
        <script src="{{asset('template/vendor/jquery/jquery-3.2.1.min.js')}}"></script> 
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
    </head>
    <body>
        <div class="main">

            <form  method="POST" class="form" id="form-login">
              <h3 class="heading">Đăng nhập</h3>
              <p class="desc">Cùng nhau học lập trình miễn phí tại F8 ❤️</p>
        
              <div class="spacer"></div>
        
              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
                <span class="form-message"></span>
              </div>
        
              <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <span class="form-message"></span>
              </div>
        
              <button type="button" class="form-submit" id="form-submit-login">Đăng Nhập</button>
            </form>
        
          </div>
          <script src="{{asset('template/js/validator.js')}}"></script>
          <script>
        
            document.addEventListener('DOMContentLoaded', function () {
        
             Validator({
                form: '#form-login',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                  Validator.isEmail('#email'),
                  Validator.minLength('#password', 6),
                ],
                
              });

            });
        
          </script>
           <script src="{{asset('template/js/ajax.js')}}"></script>
    </body>
</html>