@extends('customer.template')

@section('styles')

@endsection

@section('contents')
<h1 class="text-center">Equipment List</h1>

<div class="row">
	@foreach($cats as $cat)
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      
	      <div class="caption">
	        <h3 class="text-center">{{$cat->equipment_name}}</h3>
	       
	        <p class="text-center">
	        	<a href="{{route('customer_equipment_details',$cat->id)}}" class="btn btn-primary" role="button">View</a>
	        </p>
	      </div>
	    </div>
	  </div>
  @endforeach
</div>
@endsection

@section('scripts')

@endsection