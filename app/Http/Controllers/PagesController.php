<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\User;
use App\Http\Requests;

class PagesController extends Controller
{
	public function showRegisterForm(){
    	return view('register');
    }

    // public function showUsers()
    // {
    // 	$users = User::all();
    // 	return view('user', compact('users'));
    // }

    public function showUser($id)
    {
    	$user = User::find($id);
    	return view('user', compact('user'));
    }

    public function register(){
    	$rules = array(
	        'first_name'    => 'required', // make sure the username field is not empty
	        'last_name'    => 'required', // make sure the username field is not empty
	        'email'    => 'required|email', // make sure the username field is not empty
	        'password' => 'required|alphaNum|min:3', // password can only be alphanumeric and has to be greater than 3 characters
	        'confirm_password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
	    );

    	$validator = Validator::make(Input::all(), $rules);

    	if ($validator->fails()) {
        return Redirect::to('register')
            ->withErrors($validator) // send back all errors to the login form
            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    	} else{
    		$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->password = Input::get('password');
			$user->save();
			$userID = $user->id;
			return Redirect::to("users/$userID");
    	}
    }
}
