@extends('admin.template')

@section('styles')

@endsection

@section('contents')
	
	<ul class="nav nav-tabs">
	  <li role="presentation" class="active"><a href="{{route('admin_reservation')}}">Diving</a></li>
	  <li role="presentation"><a href="{{route('admin_reservation_equipment')}}">Equipments</a></li>
	</ul>
	<table class="table" id="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Persons</th>
				
				<th>Start Date</th>
				<th>End Date</th>
				<th>Status</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($reserves as $res)
				<tr>
					<td>{{$res->user->name}}</td>
					<td>{{$res->user->contact}}</td>
					<td>{{$res->user->email}}</td>
					<td>{{$res->reservation->person}}</td>
					
					<td>{{$res->reservation->start_date}}</td>
					<td>{{$res->reservation->end_date}}</td>
					<td>
						@if($res->status == 0)
							<p style="color: red">Pending</p>
						@else
							<p style="color: green">Approved</p>
						@endif
					</td>
					<td>
						<a href="{{route('admin_reservation_approve',$res->id)}}" class="btn btn-success btn-xs">Approve</a>
						<a href="{{route('admin_reservation_decline',$res->id)}}" class="btn btn-danger btn-xs">Decline</a>
						<a href="{{route('admin_reservation_user',$res->user->id)}}" class="btn btn-info btn-xs">View</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

@section('scripts')
<script src="{{URL::to('js/sweet.js')}}"></script>
<script>
	$(document).ready(function(){
		@if(Session::has('suc'))
	    swal({
	      title: "Good job!",
	      text: "You have Approved a Reservation Successfully!",
	      icon: "success",
	      button: "Ok!",
	    });
	  @endif
	  @if(Session::has('del'))
	    swal({
	      title: "Good job!",
	      text: "You have Declined a Reservation Successfully!",
	      icon: "success",
	      button: "Ok!",
	    });
	  @endif
	});
</script>
@endsection