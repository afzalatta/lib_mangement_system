@extends('AdminAuth.layout.auth')

@section('content')
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image:url({{url('/admin_assets/media/bg/bg-3.jpg')}})">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="">
								<img src="{{asset('/logo.png')}}" class="max-h-75px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">

							<div class="mb-20">
								<h3>Sign In To Student</h3>
								<div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
							</div>
							@if (\Session::has('success'))
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									{!! \Session::get('success') !!}
								</div>
							@endif

							@if (\Session::has('danger'))
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert">×</button>
									{!! \Session::get('danger') !!}
								</div>
							@endif
							<form class="form" action="{{url('/student/login')}}" method="post">
							@csrf
								<div class="form-group mb-5">
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}"/>
									@if ($errors->has('email'))
										<p class="help-block" style="color:red;text-align:left !important;">
											<strong >{{ $errors->first('email') }}</strong>
										</p>
									@endif
							</div>
								</div>
								<div class="form-group mb-5">
								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" autocomplete="off"  />
									@if ($errors->has('password'))
										<p class="help-block" style="color:red;text-align:left !important;">
										<strong>{{ $errors->first('password') }}</strong>
										</p>
									@endif
							</div>
								</div>
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
									<div class="checkbox-inline">
										<label class="checkbox m-0 text-muted">
										<input type="checkbox" name="remember" />
										<span></span>Remember me</label>
									</div>
									<a href="{{url('admin/password/reset')}}" id="kt_login_forgot" class="text-muted text-hover-primary">Forget Password ?</a>
								</div>
								<button  type="submit" class="btn blue-color-bg font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button><br>
                                <a href="{{url('student/register')}}" id="kt_login_forgot" class="text-muted text-hover-primary">Sign Up</a>
							</form>

						</div>

						<div class="login-forgot">
							<div class="mb-20">
								<h3>Forgotten Password ?</h3>
								<div class="text-muted font-weight-bold">Enter your email to reset your password</div>
							</div>
							<form class="form" id="kt_login_forgot_form">
								<div class="form-group mb-10">
									<input class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<div class="form-group d-flex flex-wrap flex-center mt-10">
									<button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Request</button>
									<button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
								</div>
							</form>
						</div>
						<!--end::Login forgot password form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->

		@endsection
