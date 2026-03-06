@extends('layouts.main')
@section('content')
 <!-- Bradcrumb Area -->
        <div class="sn-breadcrumb-area bg-breadcrumb-1 section-padding-sm" data-white-overlay="7">
            <div class="container">
				<div class="sf-breadcrumb">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>Login/Register</li>
					</ul>
				</div>
            </div>
        </div>
        <!--// Bradcrumb Area -->

		<!-- Page Conttent -->
		<main class="page-content">

            <!-- My Account Page -->
            <div class="my-account-area section-padding-lg">
                <div class="container">
                    <div class="row">

                        <!-- Login Form -->
                        <div class="col-lg-6">
							<div class="login-form-wrapper">
								<form action="#" class="sf-form sf-form-boxed">
									<div class="sf-form-inner">
										<div class="single-input">
											<label for="login-form-email">Username or email address *</label>
											<input type="text" name="login-form-email" id="login-form-email">
										</div>
										<div class="single-input">
											<label for="login-form-password">Password *</label>
											<input type="password" name="login-form-password" id="login-form-password">
										</div>
										<div class="single-input">
											<button type="submit" class="sf-button sf-button-dark mr-3">
												<span>Login</span>
											</button>
											<div class="checkbox-input">
												<input type="checkbox" name="login-form-remember" id="login-form-remember">
												<label for="login-form-remember">Remember me</label>
											</div>
										</div>
										<div class="single-input">
											<a href="#">Lost your password?</a>
										</div>
									</div>
								</form>
							</div>
                        </div>
                        <!--// Login Form -->

                        <!-- Register Form -->
                        <div class="col-lg-6">
							<div class="register-form-wrapper">
								<form action="#" class="sf-form sf-form-boxed">
									<div class="sf-form-inner">
										<div class="single-input">
											<label for="register-form-name">Username</label>
											<input type="text" name="register-form-name" id="register-form-name">
										</div>
										<div class="single-input">
											<label for="register-form-email">Email address</label>
											<input type="text" name="register-form-email" id="register-form-email">
										</div>
										<div class="single-input">
											<label for="register-form-password">Password</label>
											<input type="password" name="register-form-password" id="register-form-password">
										</div>
										<div class="single-input">
											<button type="submit" class="sf-button sf-button-dark">
												<span>Register</span>
											</button>
										</div>
									</div>
								</form>
                        	</div>
                        </div>
                        <!--// Register Form -->

                    </div>
                </div>
            </div>
            <!--// My Account Page -->


		</main>
		<!--// Page Conttent -->

@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
@endsection