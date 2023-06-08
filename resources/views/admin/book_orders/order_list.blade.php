@extends('admin.layout.app')
@section('content')
<?php 
use App\Models\Student;
use App\Models\Book;
?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="card card-custom">
				<div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label"> Orders List</h3>
                    </div>

                    
                </div>
				
				<div class="card-body">
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
					
					<table id="example"  class="table" style="width:100%">
						<thead>
							<tr>
								<th scope="col" >ID</th>
								<th scope="col" >Student</th>
								<th scope="col" >Book</th>
								<th scope="col" >Status</th>
								<th scope="col" >Action</th>
							</tr>
						</thead>
						<tbody>
						
							@foreach($all_orders as $single_store) 
							
							<tr>
								<?php 
									$student = Student::where('id', $single_store->student_id)->first();
									$book = Book::where('id', $single_store->book_id)->first();
								?>
								
								<td >{{$single_store->id}}</td>
								<td >{{$student->name}}</td>
								<td >{{$book->name}}</td>
								<td> 
									<span class="label label-inline font-weight-bold" style="background-color:#1BC5BD;" ><a href="" style="color:#fff;" data-toggle="modal" data-target="#exampleModal2{{$single_store->id}}">{{ucwords($single_store->status)}}</a></span>
								</td>	
								
								
								<td > 
									<a href=""  class="btn btn-sm btn-clean btn-icon tooltips" title="Delete" data-toggle="modal" data-target="#exampleModal{{$single_store->id}}" > <i class="fas fa-trash-alt red-color"> </i> </a>
								</td>
							</tr>

							<div class="modal fade" id="exampleModal2{{$single_store->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<form method="post" action="{{url('admin/order/status/'.$single_store->id)}}">
									@csrf	
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Confirmation </h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
											<select name="status" class="form-control" required>
												<option selected="true" disabled="disabled" >--Please Select--  </option>
												
												<option value="pending" >Pending</option>
												<option value="completed" >Completed</option>
												<option value="cancelled" >Cancelled</option>
												
											</select>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							
							<div class="modal fade" id="exampleModal{{$single_store->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Confirmation </h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											Are you sure to delete this?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<a href="{{url('/admin/order/delete/'.$single_store->id)}}" class="btn btn-danger">Delete</a>
										</div>
									</div>
								</div>
							</div>

							@endforeach
								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection