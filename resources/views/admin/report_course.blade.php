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
<ul class="nav nav-tabs">
	  <li role="presentation" ><a href="{{route('admin_reports')}}">Diving</a></li>
	  <li role="presentation" class="active"><a href="{{route('admin_reports_course')}}">Diving Course</a></li>
</ul>
	<form action="{{route('admin_reports_course_generate')}}" method="GET">
		<input type="date" name="start_date">
		<input type="date" name="end_date">
		@csrf
		<input type="submit" value="Generate">
	</form>
	<table class="table" id="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Course</th>
				<th>Pax</th>
				<th>Date</th>
				<th>Bill</th>
			</tr>
		</thead>
		<tbody>
			<?php $total=0;?>
			@foreach($courses as $course)
				<tr>
					<td>{{$course->user->name}}</td>
					<td>{{$course->user->contact}}</td>
					<td>{{$course->user->email}}</td>
					<td>{{$course->course->title}}</td>
					<td>{{$course->person}}</td>
					<td>{{$course->start_date}}</td>
					<td>{{$total = $total + ($course->course->price * $course->person) }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

@section('scripts')

@endsection