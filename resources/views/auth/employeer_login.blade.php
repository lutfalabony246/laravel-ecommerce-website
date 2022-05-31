
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href=" {{ asset('backend/images/favicon.ico') }}">

    <title> Shop Now</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href=" {{ asset('backend/css/vendors_css.css') }}">

	<!-- Style-->
	<link rel="stylesheet" href=" {{ asset('backend/css/style.css') }}">
	<link rel="stylesheet" href=" {{ asset('backend/css/skin_color.css') }}">

</head>
<body class="hold-transition theme-primary bg-gradient-success">

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="content-top-agile p-10">
							<h2 class="text-white">Welcome To Shop Now</h2>
							<h2 class="text-white">Employeer Login</h2>

						</div>
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed">

							<form action="{{ url('employeer/login') }}" method="POST">

								@csrf

								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-email" style="font-size: 30px"></i></span>
										</div>
										<input type="email" class="form-control pl-15 bg-transparent text-white plc-white" name="email" id="email" placeholder="Employeer Email">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text  bg-transparent text-white"><i class="ti-lock" style="font-size: 30px"></i></span>
										</div>
										<input type="password" id="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white"
										placeholder="Employeer Password">
									</div>
								</div>
								  <div class="row">
									<div class="col-6">
									  <div class="checkbox text-white">
										<input type="checkbox" id="remember_me" name="remember_me" >
										<label for="remember_me">{{ __('Remember me') }}</label>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-6">
									 <div class="fog-pwd text-right">
										<a href=" {{  route('password.request') }}" class="text-white"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-warning btn-rounded mt-10" style="color:black"> Login </button>
									</div>
									<!-- /.col -->
								  </div>
							</form>




						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>

</body>
</html>
