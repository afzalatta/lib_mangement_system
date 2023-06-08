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
										<form class="form" action="{{url('admin/book/edit/'.$book->id)}}" method="post" enctype="multipart/form-data">
										{{csrf_field()}}
											<div class="row justify-content-center">
												<div class="col-xl-9">
													<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
														<h5 class="text-dark font-weight-bold mb-10">Edit Book</h5>
													
														<div class="form-group row">
																<label class="col-xl-3 col-lg-3 col-form-label text-left">Image</label>
																<div class="col-lg-9 col-xl-9">
																<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
																	<div class="image-input image-input-outline" id="kt_user_add_avatar">
																		
																		<img id="preview_img" src="{{asset('/uploads/books/thumbs/'.$book->image)}}" class="" width="200" height="200"  onerror="this.onerror=null;this.src='{{asset('/uploads/no_image.png')}}';"/>
																		<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar" >
																			<i class="fa fa-pen icon-sm text-muted"></i>
																			<input type="file" name="image" id="image" onchange="loadPreview(this);" >
																			<input type="hidden" name="profile_avatar_remove" />
																		</label>
																		
																		<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
																		
																	</div>
																		@if ($errors->has('image'))
																			<span class="help-block" style="color: red">
																				<strong>{{ $errors->first('image') }}</strong>
																			</span>
																		@endif
																	</div>
																</div>
															</div>
                                    
                                                            <div class="form-group row">
																<label class="col-xl-3 col-lg-3 col-form-label"> Name </label>
																<div class="col-lg-9 col-xl-9">
																	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
																	<input type="text"   class="form-control form-control-solid form-control-lg count-chars" id = "CharCounter" data-chars-max="20" data-msg-color="danger" maxlength="20"  name="name" placeholder=" Name " value="{{ $book->name }}">
																	
                                                                        @if ($errors->has('name'))
																			<span class="help-block" style="color: red">
																				<strong>{{ $errors->first('name') }}</strong>
																			</span>
																		@endif
																	</div>
																</div>
															</div>

															<div class="form-group row">
																<label class="col-xl-3 col-lg-3 col-form-label">Category </label>
																<div class="col-lg-9 col-xl-9">
																	<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
																		
																		<select name="category" class="form-control form-control-solid form-control-lg" required> 
                                                                        <option selected="true" disabled="disabled" >--Please Select--  </option>
                                                                            @foreach($categories as $category)
                                                                            <option value="{{$category->id}}" @php if(old('category')==$category->id){@endphp selected="selected" @php } else if($category->id==$book->category_id){@endphp selected="selected" @php }@endphp>{{$category->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @if ($errors->has('category'))
																			<span class="help-block" style="color: red">
																				<strong>{{ $errors->first('category') }}</strong>
																			</span>
																		@endif
																	</div>
																</div>
															</div>

															<div class="form-group row">
																<label class="col-xl-3 col-lg-3 col-form-label">Publisher </label>
																<div class="col-lg-9 col-xl-9">
																	<div class="form-group{{ $errors->has('publisher') ? ' has-error' : '' }}">
																		
																		<select name="publisher" class="form-control form-control-solid form-control-lg" required> 
                                                                        <option selected="true" disabled="disabled" >--Please Select--  </option>
                                                                            @foreach($publishers as $publisher)
                                                                            <option value="{{$publisher->id}}" @php if(old('publisher')==$publisher->id){@endphp selected="selected" @php } else if($publisher->id==$book->publisher_id){@endphp selected="selected" @php }@endphp>{{$publisher->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @if ($errors->has('publisher'))
																			<span class="help-block" style="color: red">
																				<strong>{{ $errors->first('publisher') }}</strong>
																			</span>
																		@endif
																	</div>
																</div>
															</div>

															<div class="form-group row">
																<label class="col-xl-3 col-lg-3 col-form-label">Author </label>
																<div class="col-lg-9 col-xl-9">
																	<div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
																		
																		<select name="author" class="form-control form-control-solid form-control-lg" required> 
                                                                        <option selected="true" disabled="disabled" >--Please Select--  </option>
                                                                            @foreach($authors as $author)
                                                                            <option value="{{$author->id}}" @php if(old('author')==$author->id){@endphp selected="selected" @php } else if($author->id==$book->author_id){@endphp selected="selected" @php }@endphp>{{$author->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @if ($errors->has('author'))
																			<span class="help-block" style="color: red">
																				<strong>{{ $errors->first('author') }}</strong>
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