<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin');
	}

    public function LoginForm(){
    	return view('auth.admin-login');
    }

    public function login(Request $request){
    	//Validate inputs from the form
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	//Attempt to log the user in
    	//Auth::guard('admin')->attempt($credentials, $remember); 
    	if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password] , $request->remember)){
    		//If successful redirect to intended location
    		return redirect()->intended(route('product.create'));
    	}

    	//If unsuccessful then redirect to login with form data
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
