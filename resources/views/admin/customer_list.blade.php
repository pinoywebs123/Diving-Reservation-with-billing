@extends('admin.template')

@section('styles')

@endsection

@section('contents')

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
				<th>Username</th>
				<th>Email</th>
				<th>Contact</th>
				<th>Date Registered</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach($customers as $customer)
				<tr>
					<td>{{$customer->name}}</td>
					<td>{{$customer->username}}</td>
					<td>{{$customer->email}}</td>
					<td>{{$customer->contact}}</td>
					<td>{{$customer->created_at->diffForHumans()}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

@section('scripts')

@endsection