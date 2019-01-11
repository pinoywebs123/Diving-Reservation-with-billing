<?php 

namespace App\Diving\Auth;
use Illuminate\Http\Request;
use App\Reservation;
use App\CustomerReservation;
use Auth;
class ReservationValidation {

	private $request;

	public function __construct(Request $request){
		$this->request = $request;
	}

	public function reservation_validate(){
		
		$res = Reservation::create($this->request->all());
		$cust_resev = new CustomerReservation;
		$cust_resev->reservation_id = $res->id;
		$cust_resev->status = 0;
		$cust_resev->user_id = Auth::user()->id;
		
		$cust_resev->save();
		return redirect()->route('customer_reservation_confirmation',$cust_resev->id);
	}
}