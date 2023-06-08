@extends('admin.layout.app')
@section('content')
				
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container"> 
			<div class="card card-custom card-transparent">
				<div class="card-body p-0">
					<div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="true">
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
						<div class="card card-custom card-shadowless rounded-top-0">
							<div class="card-body p-0">
								<div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
									<div class="col-xl-12 col-xxl-10">
										<form class="form" action="{{url('admin/edit/password')}}" method="post" enctype="multipart/form-data">
										{{csrf_field()}}
											<div class="row justify-content-center">
												<div class="col-xl-9">
													<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
														<h5 class="text-dark font-weight-bold mb-10">Edit Admin's Profile Password:</h5>
													
														<div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">Current Password</label>
															<div class="col-lg-9 col-xl-9">
																<div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
																	<input class="form-control form-control-solid form-control-lg" name="current_password" placeholder="Current Password" value="{{ old('current_password') }}" type="text" />
																	@if ($errors->has('current_password'))
																		<span class="help-block" style="color: red">
																		<strong>{{ $errors->first('current_password') }}</strong>
																		</span>
																	@endif
                                            					</div>	
															</div>
														</div>

                                                        <div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
															<div class="col-lg-9 col-xl-9">
																<div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
																	<input class="form-control form-control-solid form-control-lg" name="new_password" placeholder="New Password" value="{{ old('new_password')}}" type="text" />
																	@if ($errors->has('new_password'))
																		<span class="help-block" style="color: red">
																		<strong>{{ $errors->first('new_password') }}</strong>
																		</span>
																	@endif
                                            					</div>	
															</div>
														</div> 

                                                        <div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
															<div class="col-lg-9 col-xl-9">
																<div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
																	<input class="form-control form-control-solid form-control-lg" name="confirm_password" placeholder="Confirm Password"  value="{{ old('c_password') }}" type="text" />
																	@if ($errors->has('confirm_password'))
																		<span class="help-block" style="color: red">
																		<strong>{{ $errors->first('confirm_password') }}</strong>
																		</span>
																	@endif
                                            					</div>	
															</div>
														</div>

													</div>
														<button type="submit" class="btn blue-color-bg font-weight-bolder px-9 py-4" >Submit</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection