<?php 

namespace App\Diving\Auth;
use Illuminate\Http\Request;
use App\User;
use Auth;
class LoginValidation {
	private $request;

	public function __construct(Request $request){
		$this->request = $request;
	}

	public function login_validate(){
	
		 if(Auth::attempt( $this->request->only('username','password'))){
		 	if(Auth::user()->role_id == 1){
		 		return redirect()->route('admin_home');
		 	}{
		 		return redirect()->route('customer_home');
		 	}
		 }else{
		 	return redirect()->back()->with('err','Invalid Username/Password');
		 }
	}
}
