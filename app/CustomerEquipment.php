<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class CustomerEquipment extends Model
{
    public function equipment(){
    	return $this->belongsto(Equipment::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function getUserName($id){
    	return User::where('id',$id)->first();
    }
}
