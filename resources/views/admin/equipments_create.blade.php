@extends('admin.template')

@section('styles')

@endsection

@section('contents')
<ul class="nav nav-tabs">
  <li ><a href="{{route('admin_equipment')}}">Equipment List</a></li>
  <li class="active"><a href="{{route('admin_equipment_create')}}">Create Equipment</a></li>
  
</ul>
	<div>
		<div class="col-md-6">
			<h3 class="text-center">Create Equipment</h3>
			<form action="{{route('admin_equipment_create_check')}}" method="POST">
				<div class="form-group {{$errors->has('equipment_name') ? 'has-error': ''}}">
					<label>Equipment Name</label>
					<input type="text" name="equipment_name" class="form-control">
				</div>
				<div class="form-group">
					@csrf
					<input type="submit" value="SUBMIT" class="btn btn-primary">
				</div>
			</form>
		</div>
		<div class="col-md-6">
			<h3 class="text-center">Create Equipment Details</h3>
			<form action="{{route('admin_equipmentdetails_create_check')}}" method="POST">
				<div class="form-group">
					<label>Select Equipment</label>
					<select name="category" class="form-control">
						@foreach($equipments as $equip)
							<option value="{{$equip->id}}">{{$equip->equipment_name}}</option>
						@endforeach
						
					</select>
				</div>
				<div class="form-group {{$errors->has('equipment_size') ? 'has-error': ''}}">
					<label>Equipment Size</label>
					<select name="equipment_size" class="form-control">
						<option value="XL">Extra Large</option>
						<option value="L">Larage</option>
						<option value="M">Medium</option>
						<option value="S">Small</option>
						<option value="XS">Extra Small</option>
					</select>
				</div>
				<div class="form-group {{$errors->has('equipment_quantity') ? 'has-error': ''}}">
					<label>Equipment Quantity</label>
					<input type="number" name="equipment_quantity" class="form-control">
				</div>
				<div class="form-group {{$errors->has('equipment_price') ? 'has-error': ''}}">
					<label>Equipment Price / Day</label>
					<input type="number" name="equipment_price" class="form-control">
				</div>
				<div class="form-group">
					@csrf
					<input type="submit" value="SUBMIT" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
@endsection

@section('scripts')
<script src="{{URL::to('js/sweet.js')}}"></script>
<script>
	$(document).ready(function(){
		@if(Session::has('suc'))
		    swal({
		      title: "Good job!",
		      text: "You have Added Equipment Successfully!",
		      icon: "success",
		      button: "Ok!",
		    });
	   @endif
	   @if(Session::has('suc2'))
		    swal({
		      title: "Good job!",
		      text: "You have Added Equipment Details Successfully!",
		      icon: "success",
		      button: "Ok!",
		    });
	   @endif
	});
</script>
@endsection