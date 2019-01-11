<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CustomerEquipment;

class Equipment extends Model
{
    protected $fillable = ['category_id','size','quantity','price','status'];

	protected $quantity = 0;
    
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function equipment_count($id){

    	 $counts = CustomerEquipment::where('equipment_id',$id)->where('status',1)->get();

    	 foreach($counts as $count){
    	 	$this->quantity = $this->quantity + $count->quantity;
    	 }

    	 return $this->quantity;
    }
}
