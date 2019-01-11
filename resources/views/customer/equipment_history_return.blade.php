@extends('customer.template')

@section('styles')

@endsection

@section('contents')
<h2 class="text-center">Reservation History</h2>
<div class="row">
  <ul class="nav nav-tabs">
    <li ><a href="{{route('customer_equipment_history')}}">Pending</a></li>
    <li ><a href="{{route('customer_equipment_history_approve')}}">Rented</a></li>
    <li class="active"><a href="{{route('customer_equipment_history_returned')}}">Returned</a></li>
    
  </ul>

  @if(Session::has('return'))
    <div class="alert alert-warning">
        {{Session::get('return')}}
    </div>
  @endif
	<table class="table" id="table">
    <thead>
      <tr>
        <th>Equipment</th>
        <th>Price</th>
        <th>Size</th>
        <th>Date</th>
       <th>Status</th>
       
      </tr>
    </thead>
    <tbody>
       <?php $total = 0; ?>
      @foreach($equipments as $equip)
       
        <tr>
          <td>{{$equip->equipment->category->equipment_name}}</td>
           <td>{{$equip->equipment->price}}</td>
          <td>{{$equip->equipment->size}}</td>
          <td>{{$equip->start_date}} to {{$equip->end_date}}</td>
          <td>
            @if($equip->status == 2)
              <p style="color: black">Returned</p>
           

            @endif
          </td>
          
        </tr>
        <?php $total = $total + $equip->equipment->price * $equip->days; ?>
      @endforeach
    </tbody>
  </table>
  <h2 class="text-center">Total: {{$total}}</h2>
</div>

 
@endsection

@section('scripts')

@endsection