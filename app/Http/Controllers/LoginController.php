<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	protected $username = 'username';
	public function login(Request $request) {
		$message = NULL;
		if(Auth::attempt($request->only(['username', 'password']))) {
			return redirect('logs');
		} else {
			$message = "Invalid Username and/or Password";
			return view('login', [
				'message' => $message
			]);
		}
	}

	public function logout(Request $request) {
		Auth::logout();
		return redirect('login');
	}
}