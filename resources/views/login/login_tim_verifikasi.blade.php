<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{{ url('login/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ url('login/css/login.css')}}">
	<title>Login</title>
</head>
<body>

	<body class="body_login">	
		<div class="container">
			<div class="row row-login">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="login text-center">
						<div class="label"><h2 class="shadow">LOGIN <br>TIM VERIFIKASI</h2> <hr class="shadow"></div>
						
					<form action="{{ url('/check_login_tim_verifikasi')}}" method="post" class="form">
								
					<div class="form-group">
									<input type="text" class="form-control" name="email" placeholder="E-mail" required="">
								</div>
								<div class="form-group">
									<input type="Password" class="form-control" name="password" placeholder="Password" required="">
								</div>
								<br>
								<div class="form-group">
									<input type="submit" class="btn btn-default" value=" LOGIN " style="width: 50%">
								</div>
								{{csrf_field()}}
						</form>

					</div>
				</div>
				<div class="col-md-4"></div>				
			</div>
		</div>
	</body>
</html>


</script>

<script src="{{ url('js/jquery-1.8.3.min.js')}}"></script>              
<script src="{{ url('js/bootstrap.min.js')}}"></script>