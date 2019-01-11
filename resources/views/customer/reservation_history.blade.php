@extends('customer.template')

@section('styles')

@endsection

@section('contents')
<h2 class="text-center">Reservation History</h2>
<div class="row">
	<table class="table" id="table">
    <thead>
      <tr>
        <th>Start Date</th>
        <th>End Date</th>
        <th>No. Persons</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($reserverions as $res)
        <tr>
          <td>{{$res->reservation->start_date}}</td>
          <td>{{$res->reservation->end_date}}</td>
          <td>{{$res->reservation->person}}</td>
          <td>
            @if($res->status == 0)
              <p style="color: red">Pending</p>
            @else
              <p style="color: green">Approved</p>
            @endif
          </td>
          <td>
           
            <a href="{{route('customer_reservation_confirmation',$res->id)}}" class="btn btn-info btn-sm">View More</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

 
@endsection

@section('scripts')

@endsection