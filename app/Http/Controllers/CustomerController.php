<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Equipment;
use App\CustomerReservation;
use App\CustomerEquipment;
use App\Diving\Auth\ReservationValidation;
use App\Http\Requests\reservationcheck;
use App\Diving\Customer\CustomerQueries;
use App\Http\Requests\equipmentcheck;
use App\CustomerCourse;

class CustomerController extends Controller
{
    public function __construct(){
    	$this->middleware('customercheck');
    }

    public function customer_reservation_check(reservationcheck $check, ReservationValidation $validate){
        return $validate->reservation_validate();
    }
    public function customer_reservation(){
        return view('customer.reservation');
    }

    public function customer_home(){
    	return view('customer.home');
    }
    public function customer_logout(){
    	Auth::logout();
    	return redirect()->route('auth_login');
    }
    public function customer_equipment_list(){
        $cats = Category::all();
        return view('customer.equipment_list',compact('cats'));
    }
    public function customer_equipment_details($id){
        $infos = Equipment::where('category_id',$id)->where('status',1)->get();
        return view('customer.equipment_details', compact('infos'));
    }
    public function customer_reservation_confirmation(CustomerQueries $validate,$id){
        return $validate->getReservationData($id);    
    }
    public function customer_reservation_history(){
        $reserverions = CustomerReservation::where('user_id', Auth::id())->orderBy('id','DESC')->get();
        return view('customer.reservation_history',compact('reserverions'));
    }
   public function equipment_reservation_reserve(equipmentcheck $check, $id,CustomerQueries $validate){
    return $validate->equipmentValidate($id);
   }

   public function customer_equipment_history(){
        $equipments = CustomerEquipment::where('user_id',Auth::id())->where('status',0)->get();
        return view('customer.equipment_history',compact('equipments'));
   }

   public function customer_equipment_history_approve()
   {
     $equipments = CustomerEquipment::where('user_id',Auth::id())->where('status',1)->get();
     return view('customer.equipment_history_approve',compact('equipments'));
   }

   public function customer_equipment_history_return_item($id)
   {
        $find = CustomerEquipment::findOrFail($id);
        $find->status = 2;
        $find->save();

        $equip = Equipment::findOrFail($find->equipment_id);
        $equip->quantity = $equip->quantity + $find->quantity;
        $equip->save();

        return back()->with('return','Equipment has been return successfully!');
   }

   public function customer_equipment_history_returned()
   {
    $equipments = CustomerEquipment::where('user_id',Auth::id())->where('status',2)->get();
     return view('customer.equipment_history_return',compact('equipments'));

   }

   public function customer_diving_course(Request $request)
   {

      $response = [];
    

     if($request->a1 > 0){
        $find = CustomerCourse::where('start_date',$request->date)->where('user_id',Auth::id())->where('status_id',1)->where('course_id',1)->get();
       

        if($find->count() > 0){
            array_push($response, 1);
        }else{
           $new = new CustomerCourse;
          $new->course_id = 1;
          $new->user_id = Auth::id();
          $new->person = $request->a1;
          $new->status_id = 0;
          $new->start_date = $request->date;
          $new->save();
        }
       
     }

     if($request->a2 > 0){
       $find = CustomerCourse::where('start_date',$request->date)->where('user_id',Auth::id())->where('status_id',1)->where('course_id',2)->get();

       if($find->count() > 0){
            array_push($response, 2);
        }else{
          $new = new CustomerCourse;
        $new->course_id = 2;
        $new->user_id = Auth::id();
        $new->person = $request->a2;
        $new->status_id = 0;
        $new->start_date = $request->date;
        $new->save();
        }
        
     }

     if($request->a3 > 0){
        $find = CustomerCourse::where('start_date',$request->date)->where('user_id',Auth::id())->where('status_id',1)->where('course_id',3)->get();

       if($find->count() > 0){
            array_push($response, 3);
        }else{
          $new = new CustomerCourse;
        $new->course_id = 3;
        $new->user_id = Auth::id();
        $new->person = $request->a3;
        $new->status_id = 0;
        $new->start_date = $request->date;
        $new->save();

        }
        
     }

     if($request->a4 > 0){
      $find = CustomerCourse::where('start_date',$request->date)->where('user_id',Auth::id())->where('status_id',1)->where('course_id',4)->get();

       if($find->count() > 0){
            array_push($response, 4);
        }else{
          $new = new CustomerCourse;
        $new->course_id = 4;
        $new->user_id = Auth::id();
        $new->person = $request->a4;
        $new->status_id = 0;
        $new->start_date = $request->date;
        $new->save();
        }
        
     }

     if($request->a5 > 0){
      $find = CustomerCourse::where('start_date',$request->date)->where('user_id',Auth::id())->where('status_id',1)->where('course_id',5)->get();

       if($find->count() > 0){
            array_push($response, 5);
        }else{
          $new = new CustomerCourse;
        $new->course_id = 5;
        $new->user_id = Auth::id();
        $new->person = $request->a5;
        $new->status_id = 0;
        $new->start_date = $request->date;
        $new->save();
        }
        
     }

     if($request->a6 > 0){
      $find = CustomerCourse::where('start_date',$request->date)->where('user_id',Auth::id())->where('status_id',1)->where('course_id',6)->get();

       if($find->count() > 0){
            array_push($response, 6);
        }else{
          $new = new CustomerCourse;
        $new->course_id = 6;
        $new->user_id = Auth::id();
        $new->person = $request->a6;
        $new->status_id = 0;
        $new->start_date = $request->date;
        $new->save();
        }
        
     }

     if($request->a7 > 0){
       $find = CustomerCourse::where('start_date',$request->date)->where('user_id',Auth::id())->where('status_id',1)->where('course_id',7)->get();

       if($find->count() > 0){
            array_push($response, 7);
        }else{
            $new = new CustomerCourse;
        $new->course_id = 7;
        $new->user_id = Auth::id();
        $new->person = $request->a7;
        $new->status_id = 0;
        $new->start_date = $request->date;
        $new->save();
        }
        
     }

     
      return response()->json($response);
   }
}
