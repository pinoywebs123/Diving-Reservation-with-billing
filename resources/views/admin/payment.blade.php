@extends('admin.template')

@section('styles')

@endsection

@section('contents')


	<div>
		<div class="col-md-6 col-md-offset-3 well">
			@if(Session::has('suc'))
				<div class="alert alert-success">
					{{Session::get('suc')}}
				</div>
			@endif

			<h3 class="text-center">Payment Details</h3>
			<form action="{{route('admin_payment_check')}}" method="POST">
				<div class="form-group">
					<label>Bank Name</label>
					<input type="text" name="bank" class="form-control" placeholder="Enter Bank Account" required="">
				</div>
				<div class="form-group">
					<label>Staff Name</label>
					<input type="text" name="staff" class="form-control" placeholder="Enter Staff" required="">
				</div>
				<div class="form-group">
					<label>Contact</label>
					<input type="text" name="contact" class="form-control" placeholder="Enter Contact" required="">
				</div>
				<div>
					@csrf
					<button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('scripts')

@endsection