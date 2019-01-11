@extends('admin.template')

@section('styles')

@endsection

@section('contents')
	
	<ul class="nav nav-tabs">
	  <li role="presentation" ><a href="{{route('admin_reservation')}}">Diving</a></li>
	  <li role="presentation" class="active"><a href="{{route('admin_reservation_equipment')}}">Equipments</a></li>
	</ul>
	<table class="table" id="table">
		<thead>
			<tr>
				<th>Name</th>
				
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					
					<td>
						<a href="{{route('admin_reservation_equipment_list',$user->id)}}" class="btn btn-info btn-xs">View Reservations</a>
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
	      text: "You have Approved a Equipment Successfully!",
	      icon: "success",
	      button: "Ok!",
	    });
	  @endif
	  @if(Session::has('del'))
	    swal({
	      title: "Good job!",
	      text: "You have Declined a Equipment Successfully!",
	      icon: "success",
	      button: "Ok!",
	    });
	  @endif
	});
</script>
@endsection