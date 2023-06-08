<?php $__env->startSection('content'); ?>
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image:url(<?php echo e(url('/admin_assets/media/bg/bg-3.jpg')); ?>)">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="">
								<img src="<?php echo e(asset('/logo.png')); ?>" class="max-h-75px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">

							<div class="mb-20">
								<h3>Sign In To Student</h3>
								<div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
							</div>
							<?php if(\Session::has('success')): ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<?php echo \Session::get('success'); ?>

								</div>
							<?php endif; ?>

							<?php if(\Session::has('danger')): ?>
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<?php echo \Session::get('danger'); ?>

								</div>
							<?php endif; ?>
							<form class="form" action="<?php echo e(url('/student/login')); ?>" method="post">
							<?php echo csrf_field(); ?>
								<div class="form-group mb-5">
								<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" value="<?php echo e(old('email')); ?>"/>
									<?php if($errors->has('email')): ?>
										<p class="help-block" style="color:red;text-align:left !important;">
											<strong ><?php echo e($errors->first('email')); ?></strong>
										</p>
									<?php endif; ?>
							</div>
								</div>
								<div class="form-group mb-5">
								<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" autocomplete="off"  />
									<?php if($errors->has('password')): ?>
										<p class="help-block" style="color:red;text-align:left !important;">
										<strong><?php echo e($errors->first('password')); ?></strong>
										</p>
									<?php endif; ?>
							</div>
								</div>
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
									<div class="checkbox-inline">
										<a href="<?php echo e(url('/student/register')); ?>" class="text-muted text-hover-primary">
											<span></span>Don't have an account?
										</a>
									</div>
									<a href="<?php echo e(url('student/password/reset')); ?>" id="kt_login_forgot" class="text-muted text-hover-primary">Forget Password ?</a>
								</div>
								<button  type="submit" class="btn blue-color-bg font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button><br>
                                <a href="<?php echo e(url('student/register')); ?>" id="kt_login_forgot" class="text-muted text-hover-primary">Sign Up</a>
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

		<?php $__env->stopSection(); ?>

<?php echo $__env->make('StudentAuth.layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\installed Xampp\htdocs\my_projects\Library ManagmentV3\Library Managment\resources\views/StudentAuth/login.blade.php ENDPATH**/ ?>