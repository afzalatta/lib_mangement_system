@extends('AdminAuth.layout.auth')

@section('content')
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">   
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image:url({{url('/admin_assets/media/bg/bg-3.jpg')}})">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="{{asset('/logo.png')}}" class="max-h-75px" alt="" />
							</a>
						</div>  
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							 
							<div class="mb-20">
								<h3>Reset Password</h3>
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
							<form class="form" action="{{url('/admin/password/email')}}" method="post">
							@csrf
								<div class="form-group mb-5">
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Enter Recovery Email" name="email" autocomplete="off" value="{{ old('email') }}"/>
									@if ($errors->has('email'))
                                        <p class="help-block" style="color: red;text-align:left !important;">
                                            <strong>{{ $errors->first('email') }}</strong>
										</p>
                                    @endif

                            </div>
								</div>
                                <span class="pull-right">
                                    <a  href="{{url('admin/login') }}"> Go to Login Page</a>
                                </span>
								<button  type="submit" class="btn blue-color-bg font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
							</form>
							
						</div>
						
					
					</div>
				</div>
			</div> 
			<!--end::Login-->
		</div>
		<!--end::Main-->

		@endsection
	