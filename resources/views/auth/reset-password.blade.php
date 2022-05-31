@extends('frontend.main_master')

 @section('index')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in" style="padding-top: 150px">
	<h4 class="">Forgot Password</h4>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

	  	<div class="form-group">
		    <label class="info-title" for="email">Email <span>*</span></label>
		    <input type="email" class="form-control unicase-form-control text-input" id="email"  name="email">
        </div>

        <div class="form-group">
		    <label class="info-title" for="password">password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" id="password"  name="password">
        </div>


        <div class="form-group">
		    <label class="info-title" for="password_confirmation">password_confirmation <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation"  name="password_confirmation">
        </div>

	  	<button type="submit" class="btn-upper btn btn-success checkout-page-button">Reset Password</button>
	</form>

</div>
<!-- Sign-in -->


</div><!-- /.row -->
</div><!-- /.sigin-in-->

</div><!-- /.container -->

@endsection
