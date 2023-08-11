
@include('admin.dashboard.header')
 @extends('admin.dashboard.header')
@push('title')
    <title>Team Members</title>
@endpush
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="myTable" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>No.</th>
										<th>Name</th>
										<th>Mobile No.</th>
										<th>Email</th>
										<th style="text-align: center">Action</th>
									</tr>
								</thead>
								<tbody>
                                    @if(count($data)>0)
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($data as $key => $value)
                                    <tr id="{{$value->user_id}}">
										<td>{{$i++}}</td>
										<td>{{$value->name}}</td>
										<td>{{$value->phone_number}}</td>
										<td>{{$value->email}}</td>
										<td colspan="2"><center>
										  @php
										   $user_id = Crypt::encrypt($value->user_id);
										//   $user_id = md5($value->user_id);
										  @endphp
                                         <a href="{{route('admin.edit',['id'=>$user_id])}}" class="btn btn-outline-success">Edit</a>
										<button onclick="DeleteTeam({{$value->user_id}})" class="btn btn-outline-danger">Delete</button>
                                        </center>
									</td>
									
									</tr>
                                    @endforeach
                                    @else 
                                    <tr>
										<td colspan="5" style="text-align: center; color:red;"><b>Team Records Not Found..!</b></td>
										
									</tr>
                                    @endif
									
								</tbody>
							
							</table>
						</div>
					</div>
				</div>
@include('admin.dashboard.footer')
<script>
	 $('#myTable').DataTable({
	 });
</script>
