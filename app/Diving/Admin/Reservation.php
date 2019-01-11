<?php 
namespace App\Diving\Admin;
use Illuminate\Http\Request;
use App\CustomerReservation;
use Illuminate\Support\Facades\Mail;
use App\Category;
use App\Equipment;
use App\CustomerEquipment;
use App\CustomerCourse;

class Reservation {
	private $request;

  public function __construct(Request $request){
    $this->request = $request;
  }
	
	public function reservation_approve($id){
		$find = CustomerReservation::findOrFail($id);
        $data = array('title'=> 'Divng Reservation System',
                  'content'=> 'Hi this is Jody Egsoc you\'re reservation has been approve!',
                  'email'=> $find->user->email
                  );
           Mail::send('shared.email', $data, function($message) use ($data){
            $message->to($data['email'])->subject('Diving Reservation System ');
        });

        $find->status = 1;
        $find->save();

        $find2 = CustomerCourse::where('user_id', $find->user_id)->get();
        foreach($find2 as $find3){
          $find3->status_id = 1;
          $find3->save();
        }

        return redirect()->back()->with('suc','Approve reservation!'); 
	}

	public function reservation_decline($id){
		$find = CustomerReservation::findOrFail($id);
        $data = array('title'=> 'Divng Reservation System',
                  'content'=> 'Hi this is Jody Egsoc you\'re reservation has been decline. Kindly try again with another date!',
                  'email'=> $find->user->email
                  );
           Mail::send('shared.email', $data, function($message) use ($data){
            $message->to($data['email'])->subject('Diving Reservation System ');
        });

        $find->delete();
       
        return redirect()->back()->with('del','Decline reservation!'); 
	}

  public function category_validate(){
    $cat = new Category;
    $cat->equipment_name = $this->request->equipment_name;
    $cat->save();
    return redirect()->back()->with('suc','Category Added!'); 
  }

  public function category_details_validate(){
     //return $this->request->equipment_quantity;

    $equip = new Equipment;
    $equip->category_id   = $this->request->category;
    $equip->size          = $this->request->equipment_size;
    $equip->quantity      = $this->request->equipment_quantity;
    $equip->price         = $this->request->equipment_price;
    $equip->status        = 1;
    $equip->save();


    return redirect()->back()->with('suc2','Category Added!'); 
  }

  public function equipment_approve($id){

    $find = CustomerEquipment::findOrFail($id);
    $equipment = Equipment::findOrFail($find->equipment_id);
    $equipment['quantity'] = $equipment['quantity'] - $find->quantity;
    $equipment->save();
        $data = array('title'=> 'Divng Reservation System',
                  'content'=> 'Hi this is Jody Egsoc you\'re equipment reservation has been approve. Enjoy our services!',
                  'email'=> $find->user->email
                  );
           Mail::send('shared.email', $data, function($message) use ($data){
            $message->to($data['email'])->subject('Diving Reservation System ');
        });
     $find->status = 1;
     $find->save();  


    return back()->with('suc','suc');       
  }

  public function equipment_decline($id){
    $find = CustomerEquipment::findOrFail($id);
        $data = array('title'=> 'Divng Reservation System',
                  'content'=> 'Hi this is Jody Egsoc you\'re equipment reservation has been decline. Kindly chose another equipments!',
                  'email'=> $find->user->email
                  );
           Mail::send('shared.email', $data, function($message) use ($data){
            $message->to($data['email'])->subject('Diving Reservation System ');
        });

    $find->delete();
    return back()->with('del','del');
  }
}