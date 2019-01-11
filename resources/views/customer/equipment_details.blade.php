@extends('customer.template')

@section('styles')

@endsection

@section('contents')
<h1 class="text-center">Equipment List</h1>
		@if(Session::has('suc'))
				<div class="alert alert-success">
					{{Session::get('suc')}}
				</div>
	 	@endif
	 	@if(Session::has('err'))
				<div class="alert alert-danger">
					{{Session::get('err')}}
				</div>
	 	@endif
<div class="row">
	@foreach($infos as $info)
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      
	      <div class="caption">
	        <h3 class="text-center">{{$info->category->equipment_name}}</h3>
	        
	       <ul class="list-group">
			  <li class="list-group-item">Size: <strong>{{$info->size}}</strong></li>
			  <li class="list-group-item">Quantity: <strong>{{$info['quantity']}}</strong></li>
			  <li class="list-group-item">Reserved: <strong>{{$info->equipment_count($info->id)}}</strong></li>
			  
			  <li class="list-group-item">Price: <strong>{{$info->price}}</strong></li>
			</ul>
	        <p class="text-center">
	        	<form action="{{route('equipment_reservation_reserve',$info->id)}}" method="POST">
	        		<div class="form-group">
	        			<label>Enter Quantity to used</label>
	        			<input type="number" name="quantity" class="form-control" required>
	        		</div>
	        		<div class="form-group">
	        			<label>Start Date</label>
	        			<input type="date" name="start_date" class="form-control" required="">
	        		</div>
	        		<div class="form-group">
	        			<label>End Date</label>
	        			<input type="date" name="end_date" class="form-control" required="">
	        		</div>
	        		<div class="form-group">
	        			<p class="text-center">
	        				<button type="submit" class="btn btn-primary">RESERVE</button>
	        				@csrf
	        			</p>
	        		</div>
	        	</form>
	        	
	        </p>
	      </div>
	    </div>
	  </div>
  @endforeach
</div>
@endsection

@section('scripts')

@endsection