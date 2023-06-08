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
										<form class="form" action="{{url('admin/publisher/edit/'.$publisher->id)}}" method="post" enctype="multipart/form-data">
										{{csrf_field()}}
											<div class="row justify-content-center">
												<div class="col-xl-9">
													<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
														<h5 class="text-dark font-weight-bold mb-10">Edit Publisher</h5>
													
															
                                                            <div class="form-group row">
																<label class="col-xl-3 col-lg-3 col-form-label"> Name </label>
																<div class="col-lg-9 col-xl-9">
																	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
																	<input type="text"   class="form-control form-control-solid form-control-lg count-chars" id = "CharCounter" data-chars-max="20" data-msg-color="danger" maxlength="20"  name="name" placeholder=" Name " value="{{ $publisher->name }}">
																	
                                                                        @if ($errors->has('name'))
																			<span class="help-block" style="color: red">
																				<strong>{{ $errors->first('name') }}</strong>
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

<script>
			//jQuery inpu field character counter
			$(document).ready(function(){
				/**
				* Checks for character and sets info for input
				*
				*/
				$(".count-chars").keyup(function () {
					//get input value and length
					var charInput = this.value;
					var charInputLength = this.value.length;
					
					//get data values
					const maxChars = $(this).data("chars-max");
					const messageColor = $(this).data("msg-color");
					
					//get input id and set input message id
					var inputId = this.getAttribute('id');			
					var messageDivId = inputId+"Message";
					
					//set default message for message div
					var remainingMessage = "";
					
					if (charInputLength >= maxChars) {
						//limit chars to max set
						$("#"+inputId).val(charInput.substring(0, maxChars));
						remainingMessage = "0 characters remaining";
					} else {
						remainingMessage = (maxChars - charInputLength) + " character(s) remaining";
					}
					
					
					//check if message div exists
					if($("#" + messageDivId).length == 0) {
					  //set div with message
					  $('#'+inputId).after('<div id="'+messageDivId+'" class="text-'+messageColor+' font-weight-bold">'+remainingMessage+'</div>');
					}
					else{
					  //update div message 
					  $("#" + messageDivId).text(remainingMessage);
					}
				});

				$(".count-email").keyup(function () {
					//get input value and length
					var charInput = this.value;
					var charInputLength = this.value.length;
					
					//get data values
					const maxChars = $(this).data("email-max");
					const messageColor = $(this).data("msg-color");
					
					//get input id and set input message id
					var inputId = this.getAttribute('id');			
					var messageDivId = inputId+"Message";
					
					//set default message for message div
					var remainingMessage = "";
					
					if (charInputLength >= maxChars) {
						//limit chars to max set
						$("#"+inputId).val(charInput.substring(0, maxChars));
						remainingMessage = "0 characters remaining";
					} else {
						remainingMessage = (maxChars - charInputLength) + " character(s) remaining";
					}
					
					
					//check if message div exists
					if($("#" + messageDivId).length == 0) {
					  //set div with message
					  $('#'+inputId).after('<div id="'+messageDivId+'" class="text-'+messageColor+' font-weight-bold">'+remainingMessage+'</div>');
					}
					else{
					  //update div message 
					  $("#" + messageDivId).text(remainingMessage);
					}
				});

				$(".count-address").keyup(function () {
					//get input value and length
					var charInput = this.value;
					var charInputLength = this.value.length;
					
					//get data values
					const maxChars = $(this).data("address-max");
					const messageColor = $(this).data("msg-color");
					
					//get input id and set input message id
					var inputId = this.getAttribute('id');			
					var messageDivId = inputId+"Message";
					
					//set default message for message div
					var remainingMessage = "";
					
					if (charInputLength >= maxChars) {
						//limit chars to max set
						$("#"+inputId).val(charInput.substring(0, maxChars));
						remainingMessage = "0 characters remaining";
					} else {
						remainingMessage = (maxChars - charInputLength) + " character(s) remaining";
					}
					
					
					//check if message div exists
					if($("#" + messageDivId).length == 0) {
					  //set div with message
					  $('#'+inputId).after('<div id="'+messageDivId+'" class="text-'+messageColor+' font-weight-bold">'+remainingMessage+'</div>');
					}
					else{
					  //update div message 
					  $("#" + messageDivId).text(remainingMessage);
					}
				});

			});

	</script>
@endsection