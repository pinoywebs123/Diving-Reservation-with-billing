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
	  <li role="presentation" class="active"><a href="{{route('admin_reports')}}">Diving</a></li>
	  <li role="presentation"><a href="{{route('admin_reports_course')}}">Diving Course</a></li>
</ul>
	<form action="{{route('admin_reports_generate')}}" method="GET">
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
				<th>Pax</th>
				<th>Date</th>
				<th>Bill</th>
			</tr>
		</thead>
		<tbody>
			<?php $total=0; ?>
			@foreach($reserves as $res)
				<tr>
					<td>{{$res->user->name}}</td>
					<td>{{$res->user->contact}}</td>
					<td>{{$res->user->email}}</td>
					<td>{{$res->reservation->person}}</td>
					<td>{{$res->reservation->start_date}} to {{$res->reservation->end_date}} = <?php $diff = strtotime($res->reservation->start_date) - strtotime($res->reservation->end_date);
             $days = abs(round($diff / 86400));
             echo $days; ?></td>
					<td>{{ ($res->reservation->diver * $res->reservation->person) * $days}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

@section('scripts')

@endsection