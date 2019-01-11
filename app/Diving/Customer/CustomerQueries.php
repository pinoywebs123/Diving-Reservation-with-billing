<?php 

namespace App\Diving\Customer;
use Auth;
use Illuminate\Http\Request;
use App\CustomerReservation;
use App\CustomerEquipment;
use App\Equipment;
use App\Payment;
use App\CustomerCourse;

class CustomerQueries {

	private $request;

	public function __construct(Request $request){
		$this->request = $request;
	}

	public function getReservationData($id){
		$customer =  CustomerReservation::where('id',$id)->where('user_id', Auth::id())->first();
		$payment = Payment::first();
		$courses = CustomerCourse::where('user_id',Auth::id())->where('status_id','!=',2)->get();
		return view('customer.reservation_confirm', compact('customer','payment','courses'));
	}

	public function equipmentValidate($id){
		$find = Equipment::findOrFail($id);	
		if($find->quantity < $this->request->quantity){
		return redirect()->back()->with('err','Insuficient Quanity of Equipment!');	
		}else{
			$equip = new CustomerEquipment;
			$equip->user_id = Auth::id();
			$equip->equipment_id = $id;
			$equip->quantity = $this->request->quantity;
			$equip->start_date = $this->request->start_date;
			$equip->end_date = $this->request->end_date;
			$equip->status = 0;
			$equip->save();
			return redirect()->back()->with('suc','Reserve Successfully!');
		}	
		
	}


}