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
										<form class="form" action="{{url('admin/email_template/edit/'.Hashids::encode($ifexist->id).'')}}" method="post" enctype="multipart/form-data">
										{{csrf_field()}}
											<div class="row justify-content-center">
												<div class="col-xl-9">
													<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
														<h5 class="text-dark font-weight-bold mb-10">Edit Email Template</h5>

															<div class="form-group row">
																<label class="col-xl-3 col-lg-3 col-form-label">Email Name </label>
																<div class="col-lg-9 col-xl-9">
																	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
																		<input type="text"  class="form-control form-control-solid form-control-lg" name="name" placeholder="Email Name" value="{{$ifexist->email_name}}">
																		@if ($errors->has('name'))
																			<span class="help-block" style="color: red">
																				<strong>{{ $errors->first('name') }}</strong>
																			</span>
																		@endif
																	</div>
																</div>
															</div>
															
															<div class="form-group row">
																<label class="col-xl-3 col-lg-3 col-form-label">Email Subject</label>
																<div class="col-lg-9 col-xl-9">
																	<div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
																		<input type="text"  class="form-control form-control-solid form-control-lg" name="subject" placeholder="Email Subject"  value="{{$ifexist->email_subject}}">
																		@if ($errors->has('subject'))
																			<span class="help-block" style="color: red">
																				<strong>{{ $errors->first('subject') }}</strong>
																			</span>
																		@endif
																	</div>
																</div>
															</div>

															<div class="form-group row">
																<label class="col-xl-3 col-lg-3 col-form-label">Email Content</label>
																<div class="col-lg-9 col-xl-9">
																	<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
																		<textarea id="editor2" class="form-control form-control-solid form-control-lg" rows="8" cols="2"  placeholder="Email Content"  name="content">{{$ifexist->email_body}}</textarea>
																		@if ($errors->has('content'))
																			<span class="help-block" style="color: red">
																				<strong>{{ $errors->first('content') }}</strong>
																			</span>
																		@endif
																	</div>
																	<p><strong>  Please do not change text in {}. </strong></p>
																</div>
																
															</div>
															<script>
																ClassicEditor
																.create( document.querySelector( '#editor2' ) )
															</script>

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