<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\reservationcheck;
use App\Diving\Auth\ReservationValidation;
use App\Http\Requests\logincheck;
use App\Http\Requests\registrationcheck;
use App\Diving\Auth\LoginValidation;
use App\User;

class AuthController extends Controller
{
	// public function auth_reservation_check(reservationcheck $check, ReservationValidation $validate){
 //        return $validate->reservation_validate();
	// }
 //    public function auth_reservation(){
 //    	return view('reservation');
 //    }
    public function auth_login(){
    	return view('auth.login');
    }
    public function login_check(logincheck $check,LoginValidation $validate){
    	return $validate->login_validate();
    }
    public function auth_register(){
    	return view('auth.register');
    }
    public function register_check(Request $request){
    	

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = bcrypt($request->password);
        $user->role_id = 2;
        $user->save();
        return back()->with('suc','Registered Successfully!');
    }
}
