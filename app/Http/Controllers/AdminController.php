<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\CustomerReservation;
use App\CustomerEquipment;
use App\Diving\Admin\Reservation as ReservationApproval;
use App\Http\Requests\categorycheck;
use App\Http\Requests\equipmentdetailscheck;
use App\Category;
use App\Equipment;
use DB;
use App\User;
use App\Payment;
use App\CustomerCourse;

class AdminController extends Controller
{
    public function __construct(){
    	$this->middleware('admincheck'); 
    }
    public function admin_home(){
    	return view('admin.home');
    }
    public function admin_logout(){
    	Auth::logout();
    	return redirect()->route('auth_login');
    }
    public function admin_reservation(){
        $reserves = CustomerReservation::where('status',0)->get();
        return view('admin.reservation', compact('reserves'));
    }

    public function admin_equipment(){
        $equips = Equipment::where('status',1)->get();
        return view('admin.equipments',compact('equips'));
    }

    public function admin_equipment_create(){
        $equipments = Category::all();
        return view('admin.equipments_create', compact('equipments'));
    }

    public function admin_equipment_create_check(categorycheck $check, ReservationApproval $category_check){
        return $category_check->category_validate();

    }

    public function admin_equipmentdetails_create_check( ReservationApproval $equipment_details_check){
        return $equipment_details_check->category_details_validate();

    }

    public function admin_reservation_approve(ReservationApproval $approve,$id){
          return $approve->reservation_approve($id);
    }

    public function admin_reservation_decline(ReservationApproval $decline,$id){
        return $decline->reservation_decline($id);
    }

    public function admin_reservation_equipment(){
        $reserves =  DB::table('customer_equipments')
                     ->select('user_id')
                     ->groupBy('user_id')
                     ->where('status',0)
                     ->get();
        $users = [];             
        foreach($reserves as $res){

             $user = User::where('id',$res->user_id)->first();
             array_push($users, $user);
            
        }
      
        return view('admin.reservation_equipment',compact('reserves','users'));
    }

    public function admin_reservation_equipment_list($id)
    {
        $users =  CustomerEquipment::where('user_id',$id)->where('status',0)->get();
        return view('admin.reservation_equipment_list',compact('users'));
    }

    public function admin_reservation_equipment_approve(ReservationApproval $approve,$id)
    {
       return $approve->equipment_approve($id);
    }

    public function admin_reservation_equipment_decline(ReservationApproval $decline,$id){
        return $decline->equipment_decline($id);
    }

    public function admin_equipment_delete($id)
    {
        $find = Equipment::findOrFail($id);
        $find->delete();
        return back()->with('del','Equipment has been deleted!');

    }

    public function admin_equipment_edit($id)
    {   $find = Equipment::findOrFail($id);
        
        return view('admin.equipment_edit',compact('find'));
    }

    public function admin_equipment_update(Request $request,$id)
    {
        //return $request['equipment_quantity'];
       
        $find = Equipment::findOrFail($id);
        $find->size = $request->equipment_size;
        $find->quantity = $request['equipment_quantity'];
        $find->price =  $request->equipment_price;
        $find->save();

        return back()->with('update','Equipment has been Updated!');

    }

    public function admin_customer_list()
    {
        $customers = User::where('role_id',2)->get();
        return view('admin.customer_list',compact('customers'));
    }

    public function admin_payment()
    {
        return view('admin.payment');
    }

    public function admin_reports()
    {
        $reserves = CustomerReservation::where('status','!=',0)->get();
        return view('admin.report',compact('reserves'));
    }

    public function admin_reports_generate()
    {   $start = $_GET['start_date'];
        $end = $_GET['end_date'];
        $reserves = CustomerReservation::whereBetween('created_at',[$start,$end])->get();
        return view('admin.report_generate',compact('reserves'));
    }

    public function admin_reports_course()
    {
        $courses = CustomerCourse::where('status_id','!=',0)->get();
        return view('admin.report_course',compact('courses'));
    }

    public function admin_reports_course_generate()
    {
        $start = $_GET['start_date'];
        $end = $_GET['end_date'];
        $courses = CustomerCourse::whereBetween('created_at',[$start,$end])->get();
        return view('admin.report_course_generate',compact('courses'));
    }

    public function admin_payment_check(Request $request)
    {
        Payment::truncate();
        Payment::create($request->all());
        return back()->with('suc','Payment Details Updated!');
    }

    public function admin_reservation_user($id)
    {
         $customer =  CustomerReservation::where('status',0)->where('user_id', $id)->first();
        $payment = Payment::first();
        $courses = CustomerCourse::where('user_id',$id)->where('status_id',0)->get();
        return view('admin.reservation_view',compact('customer','payment','courses'));
        
    }

}
