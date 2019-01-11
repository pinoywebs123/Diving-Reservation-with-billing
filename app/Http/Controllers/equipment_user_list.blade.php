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
				<th>Contact</th>
				<th>Quantity</th>
				<th>Days</th>
				<th>Category</th>
				<th>Size</th>
				<th>Price</th>
				<th>Status</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($reserves as $res)
				<tr>
					<td>{{$res->user->name}}</td>
					<td>{{$res->user->contact}}</td>
					<td>{{$res->quantity}}</td>
					<td>{{$res->days}}</td>
					<td>{{$res->equipment->category->equipment_name}}</td>
					<td>{{$res->equipment->size}}</td>
					<td>{{$res->equipment->price}}</td>
					<td>
						@if($res->status == 0)
							<p style="color: red">Pending</p>
						@else
							<p style="color: green">Rented</p>
						@endif
					</td>
					<td>
						<a href="{{route('admin_reservation_equipment_approve',$res->id)}}" class="btn btn-success btn-xs">Approve</a>
						<a href="{{route('admin_reservation_equipment_decline',$res->id)}}" class="btn btn-danger btn-xs">Decline</a>
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