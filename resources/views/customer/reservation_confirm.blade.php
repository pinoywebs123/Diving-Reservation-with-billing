@extends('customer.template')

@section('styles')

@endsection

@section('contents')
<h2 class="text-center">Reservation Details</h2>
<div class="row">
	
      
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
          

        </div>

        <div class="panel panel-default">
                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif
                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
                <div class="panel-heading">Online Payment with Paypal</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('addmoney.paypal') !!}" >
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">50% Down Payment</label>
                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Paywith Paypal
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
       
      </div>
      
      </div>
    
      
</div>

 
@endsection

@section('scripts')
  <script>
    $(document).ready(function(){
      var half_pay =  {{ ($diving + $course_total) / 2}} ;
      $("#amount").val(half_pay);
    });
  </script>
@endsection