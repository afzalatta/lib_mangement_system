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
										<form class="form" action="{{url('admin/edit/'.Hashids::encode($admin->id).'')}}" method="post" enctype="multipart/form-data">
										{{csrf_field()}}
											<div class="row justify-content-center">
												<div class="col-xl-9">
													<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
														<h5 class="text-dark font-weight-bold mb-10">Edit Admin</h5>
													
                                                        <div class="form-group row">
															<label class="col-xl-3 col-lg-3 col-form-label text-left">Image</label>
															<div class="col-lg-9 col-xl-9">
																<div class="image-input image-input-outline" id="kt_user_add_avatar">
																<img id="preview_img" src="{{asset('/uploads/admin/thumbs/'.$admin->logo)}}" class="" width="200" height="200" onerror="this.onerror=null;this.src='{{asset('/uploads/no_image.png')}}';"/>
																	<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar" >
																		<i class="fa fa-pen icon-sm text-muted"></i>
																		<input type="file" name="image" id="image" onchange="loadPreview(this);" >
																		<input type="hidden" name="profile_avatar_remove" />
																	</label>
																	<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
																		<i class="ki ki-bold-close icon-xs text-muted"></i>
																	</span>
																</div>
															</div>
														</div>
                                    
															<div class="form-group row">
																<label class="col-xl-3 col-lg-3 col-form-label">Name </label>
																<div class="col-lg-9 col-xl-9">
																	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
																	<input type="text"   class="form-control form-control-solid form-control-lg count-chars" id = "CharCounter" data-chars-max="25" data-msg-color="danger" maxlength="25"  name="name" placeholder=" Name " value="{{$admin->admin_name}}">	
																		
																		@if ($errors->has('name'))
																			<span class="help-block" style="color: red">
																				<strong>{{ $errors->first('name') }}</strong>
																			</span>
																		@endif
																	</div>
																</div>
															</div>

                                                            <div class="form-group row">
																<label class="col-xl-3 col-lg-3 col-form-label">Email </label>
																<div class="col-lg-9 col-xl-9">
																	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
																		<input type="email"   class="form-control form-control-solid form-control-lg count-email" id = "EmailCounter" data-email-max="50" data-msg-color="danger" maxlength="50" name="email" placeholder="Email" value="{{ $admin->admin_email }}">
																		@if ($errors->has('email'))
																			<span class="help-block" style="color: red">
																				<strong>{{ $errors->first('email') }}</strong>
																			</span>
																		@endif
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