@extends('admin.template')

@section('styles')

@endsection

@section('contents')
	
	<ul class="nav nav-tabs">
	  <li role="presentation" class="active"><a href="{{route('admin_reservation')}}">Diving</a></li>
	 
	</ul>

	<div class="col-md-6">
        <h3>Plain Diving</h3>
        <ul class="list-group">
          <?php $days = 0; ?>
          
          <li class="list-group-item">Start Date: <strong>{{$customer->reservation->start_date}}</strong> </li>
          <li class="list-group-item">End Date: <strong>{{$customer->reservation->end_date}}</strong></li> 
           <li class="list-group-item">No Days:<?php 
            $diff = strtotime($customer->reservation->start_date) - strtotime($customer->reservation->end_date);
             $days = abs(round($diff / 86400));
             echo $days;
           ?> </li>
          <li class="list-group-item">Person: <strong>{{$customer->reservation->person}}</strong></strong></li>
          <li class="list-group-item">Price: <strong>{{$customer->reservation->diver}}</strong></strong></li> 
          <li class="list-group-item active">Sub Total: <strong>P{{$diving = $customer->reservation->person * $customer->reservation->diver * $days }}</li>
         
        </ul>
          
          <h3>Diving Course</h3>
          <?php $course_total = 0; ?>
          @foreach($courses as $course)
              <ul class="list-group">
               
                <li class="list-group-item">Course Name: {{$course->course->title}}</li>
                <li class="list-group-item">Pax: {{$course->person}}</li>
                
                <li class="list-group-item">Price: {{$course->course->price}}</li>
                <li class="list-group-item active">Sub Total: {{$course->person * $course->course->price}}</li>

               
              </ul>
           <?php $course_total = $course_total + $course->person * $course->course->price;?>   
          @endforeach

       
      </div>

       <div class="col-md-6">
       
        <div class="well">
          <h3 class="text-center">NOTE</h3>
          <p class="text-center">You can also pay VIA Remittance:</p>
          <p class="text-center">Cebuana Lulier, M Lulier, LBC, PALAWAN etc.</p>
          <p class="text-center"><strong>Name: {{$payment->staff}}</strong></p>
          <p class="text-center"><strong>Contact: {{$payment->contact}}</strong></p>
          <p class="text-center"><strong>{{$payment->bank}}</strong></p>
          
			<h3 class="text-center">P{{ ($diving + $course_total)}}</h3>
        </div>
	
@endsection

@section('scripts')
<script src="{{URL::to('js/sweet.js')}}"></script>
<script>
	$(document).ready(function(){
		@if(Session::has('suc'))
	    swal({
	      title: "Good job!",
	      text: "You have Approved a Reservation Successfully!",
	      icon: "success",
	      button: "Ok!",
	    });
	  @endif
	  @if(Session::has('del'))
	    swal({
	      title: "Good job!",
	      text: "You have Declined a Reservation Successfully!",
	      icon: "success",
	      button: "Ok!",
	    });
	  @endif
	});
</script>
@endsection