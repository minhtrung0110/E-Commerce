<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng Nhập</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="{{asset('template/images/icons/favicon.ico')}}"/>
        <link rel="stylesheet"href="{{asset('template/css/login_style.css')}}">
        
    </head>
    <body>
        <div class="main">

            <form action="" method="POST" class="form" id="form-2">
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
        
              <button class="form-submit">Đăng nhập</button>
            </form>
        
          </div>
          <script src="{{asset('template/js/validator.js')}}"></script>
          <script>
        
            document.addEventListener('DOMContentLoaded', function () {
              // Mong muốn của chúng ta
           
        
              Validator({
                form: '#form-2',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                  Validator.isEmail('#email'),
                  Validator.minLength('#password', 6),
                ],
                onSubmit: function (data) {
                  // Call API
                  console.log(data);
                }
              });
            });
        
          </script>
    </body>
</html>