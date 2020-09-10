<!-- [ Preloader ] Start -->
<div class="page-loader">
	<div class="bg-primary"></div>
</div>
<!-- [ Preloader ] End -->

<!-- [ content ] Start -->
<div class="authentication-wrapper authentication-1 px-4">
	<div class="authentication-inner py-5">

		<!-- [ Logo ] Start -->
		<div class="d-flex justify-content-center align-items-center">
			<div class="ui-w-60">
				<div class="w-100 position-relative">
					<img src="assets/img/logo-dark.png" alt="Brand Logo" class="img-fluid">
				</div>
			</div>
		</div>
		<!-- [ Logo ] End -->

		<!-- [ Form ] Start -->
		<form class="my-5" method="POST" id="login">
			<div class="form-group">
				<label class="form-label">Email</label>
				<input type="text" name="email" id="email" class="form-control">
				<div class="clearfix"></div>
			</div>
			<div class="form-group">
				<label class="form-label d-flex justify-content-between align-items-end">
					<span>Password</span>
					<a href="pages_authentication_password-reset.html" class="d-block small">Forgot password?</a>
				</label>
				<input type="password" name="password" id="password" class="form-control">
				<div class="clearfix"></div>
			</div>
			<div class="d-flex justify-content-between align-items-center m-0">
				<label class="custom-control custom-checkbox m-0">
					<input type="checkbox" class="custom-control-input">
					<span class="custom-control-label">Remember me</span>
				</label>
				<button type="button" onclick="login()" class="btn btn-primary">Sign In</button>
			</div>
		</form>
		<!-- [ Form ] End -->

		<div class="text-center text-muted">
			Don't have an account yet?
			<a href="pages_authentication_register-v1.html">Sign Up</a>
		</div>

	</div>
</div>
<!-- [ content ] End -->
