<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Authenticatable;
use App\User;
use App\Http\Requests;
use DB;
use Hash;
use Socialite;
use Auth;

class PagesController extends Controller
{
	public function showRegisterForm(){
    	return view('register');
    }

    public function showUsers()
    {
    	$users = User::all();
    	return view('user', compact('users'));
    }

    public function showUser($id)
    {
    	$user = User::find($id);
    	return view('user', compact('user'));
    }

    public function register(){
    	$rules = array(
	        'first_name'    => 'required', /
	        'last_name'    => 'required', 
	        'email'    => 'required|email', 
	        'password' => 'required|alphaNum|min:3', 
	        'confirm_password' => 'required|alphaNum|min:3' 
	    );

    	$validator = Validator::make(Input::all(), $rules);
    	if ($validator->fails()) {
        return Redirect::to('register')
            ->withErrors($validator) 
            ->withInput(Input::except('password')); 
    	} else{
    		$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->full_name = $user->first_name." ".$user->last_name;
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();
			$userID = $user->id;
            if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])) {
                $userID = Auth::user()->id;
                return Redirect::to("users/$userID");
            }
    	}
    }

    public function showloginForm(){
        return view('login');
    }

    public function login(){
        
        if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])) {
            $userID = Auth::user()->id;
            return Redirect::to("users/$userID");
        }else{
            var_dump(Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]));
        }
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRegistration()
    {
    	try {
            $user = Socialite::driver('google')->stateless()->user();
        } catch (Exception $e) {
            return Redirect::to('google');
        }

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser);
        $userID = $authUser->id;
		return Redirect::to("users/$userID");
    }

    public function findOrCreateUser($googleUser)
    {
        return User::firstOrCreate([
            'full_name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id
        ]);
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }
}
