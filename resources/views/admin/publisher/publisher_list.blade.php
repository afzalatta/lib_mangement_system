@extends('admin.layout.app')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="card card-custom">
				<div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label"> Publishers List</h3>
                    </div>

                    <div class="card-toolbar">
                        <a href="{{url('admin/publisher/add')}}" class="btn blue-color-bg font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                        </span>New Record</a>
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
								<th scope="col" style="width:10%">ID</th>
								<th scope="col" style="width:10%">Name</th>
								<th scope="col" style="width:20%">Action</th>
							</tr>
						</thead>
						<tbody>
						
							@foreach($all_publishers as $single_store) 
							
							<tr>
								<td style="width:10%">{{$single_store->id}}</td>
								<td style="width:10%">{{$single_store->name}}</td>
								
								<td style="width:20%"> 
									<a href="{{url('/admin/publisher/edit/'.$single_store->id)}}" class="btn btn-sm btn-clean btn-icon tooltips" ><i class="fas fa-edit blue-color" title="Edit"></i> </a>
									<a href=""  class="btn btn-sm btn-clean btn-icon tooltips" title="Delete" data-toggle="modal" data-target="#exampleModal{{$single_store->id}}" > <i class="fas fa-trash-alt red-color"> </i> </a>
								</td>
							</tr>
							
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
											<a href="{{url('/admin/publisher/delete/'.$single_store->id)}}" class="btn btn-danger">Delete</a>
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