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
@if(Session::has('del'))
	<div class="alert alert-danger">
		{{Session::get('del')}}		
	</div>
@endif
	<table class="table" id="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Size</th>
				<th>Quanity</th>
				<th>Rented</th>
				<th>Price/Day</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($equips as $eqi)
				<tr>
					<td>{{$eqi->category->equipment_name}}</td>
					<td>{{$eqi->size}}</td>
					<td>{{$eqi['quantity']}}</td>
					<td>{{$eqi->equipment_count($eqi->quantity)}}</td>
					<td>{{$eqi->price}}</td>
					<td>
						<a href="{{route('admin_equipment_delete',$eqi->id)}}" class="btn btn-danger btn-xs">Delete</a>
						<a href="{{route('admin_equipment_edit',$eqi->id)}}" class="btn btn-info btn-xs">Edit</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

@section('scripts')

@endsection