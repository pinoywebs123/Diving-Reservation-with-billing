<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerReservation extends Model
{
    public function reservation(){
    	return $this->belongsTo('App\Reservation');
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
