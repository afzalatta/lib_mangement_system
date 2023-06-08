@extends('StudentAuth.layout.auth')

@section('content')
		<div class="d-flex flex-column flex-root">
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">   
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image:url({{url('/admin_assets/media/bg/bg-3.jpg')}})">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<div class="d-flex flex-center mb-15">
							<a href="">
								<img src="{{asset('/logo.png')}}" class="max-h-75px" alt="" />
							</a>
						</div>  
						<div class="login-signin">
							
							<div class="mb-20">
								<h3>Register To Student</h3>
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

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/student/register') }}">
                                {{ csrf_field() }}
                                <div class="form-group mb-5">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input id="name" type="text" class="form-control h-auto form-control-solid py-4 px-8" placeholder="Name" name="name" value="{{ old('name') }}" autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block" style="color:red;text-align:left !important;">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group mb-5">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="email" class="form-control h-auto form-control-solid py-4 px-8" name="email" placeholder="Email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block" style="color:red;text-align:left !important;">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group mb-5">
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="password" type="password" class="form-control h-auto form-control-solid py-4 px-8" name="password" placeholder="Password">
                                        @if ($errors->has('password'))
                                            <span class="help-block" style="color:red;text-align:left !important;">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group mb-5">
                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <input id="password-confirm" type="password" class="form-control h-auto form-control-solid py-4 px-8" name="password_confirmation" placeholder="Password Confirmation">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
									
									<a href="{{url('student/login')}}" id="kt_login_forgot" class="text-muted text-hover-primary">Back to Login</a>
								</div>

                                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn blue-color-bg font-weight-bold px-9 py-4 my-3 mx-4">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
					</div>
				</div>
			</div> 
		</div>

@endsection