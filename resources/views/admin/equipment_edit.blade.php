@extends('admin.template')

@section('styles')

@endsection

@section('contents')
<ul class="nav nav-tabs">
  <li class="active"><a href="{{route('admin_equipment')}}">Equipment List</a></li>
  <li><a href="{{route('admin_equipment_create')}}">Create Equipment</a></li>
  
</ul>
@if(Session::has('suc'))
	<div class="alert alert-success">
		{{Session::get('suc')}}		
	</div>
@endif
@if(Session::has('update'))
	<div class="alert alert-info">
		{{Session::get('update')}}		
	</div>
@endif
	<h3 class="text-center">Update Details</h3>

	
		<div class="col-md-6">
			<h3 class="text-center">Create Equipment Details</h3>
			<form action="{{route('admin_equipment_update',$find->id)}}" method="POST">
				
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
		
		<div class="col-md-6">
			<h3 class="text-center">Original Details</h3>
			<div class="list-group">
			  <a href="#" class="list-group-item disabled">Category: {{$find->category->equipment_name}}</a>
			  <a href="#" class="list-group-item">Size: {{$find->size}}</a>
			  <a href="#" class="list-group-item">Quantity: {{$find['quantity']}}</a>
			  <a href="#" class="list-group-item">Price: {{$find->price}}</a>
			</div>
		</div>
@endsection

@section('scripts')

@endsection