
<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.head')
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178 form" id="form-login-admin">
					<span class="login100-form-title">
						Sign In
					</span>

					<div class=" form-group wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="username" id="username" placeholder="Username">
						<!--<span class="focus-input100"></span>-->
						<span class="form-message"></span>
					</div>

					<div class="form-group wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" id="password" name="pass" placeholder="Password">
						<!--<span class="focus-input100"></span>-->
						<span class="form-message"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							Username / Password?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign in
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	
	@include('admin.footer')
	<script>
  
	  document.addEventListener('DOMContentLoaded', function () {
		// Mong muốn của chúng ta
		Validator({
		  form: '#form-login-admin',
		  formGroupSelector: '.form-group',
		  errorSelector: '.form-message',
		  rules: [
			//Validator.isRequired('#username', 'Vui lòng nhập đúng tên đăng nhập'),
			Validator.minLength('#password', 6),
			Validator.isRequired('#username',"Vui lòng nhập trường này"),
			Validator.isRequired('#password',"Vui lòng nhập trường này"),
		  ],
		  onSubmit: function (data) {
			// Call API
			console.log(data);
		  }//nếu muốn submit theo hành vi mặc định của form thì rào cái này lại
		});
	</script>
</body>
</html>

