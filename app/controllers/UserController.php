<?php

class UserController extends BaseController {



	public function getLogin() {
		return View::make('users.login')->with('title', 'Login');
	}

	public function postSignIn() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
		    return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
		} else {
		    return Redirect::to('users/login')
		        ->with('error', 'Your username/password combination was incorrect')
		        ->withInput();
		}
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::to('users/login')->with('logout', 'You have been logged out!');
	}

	public function getDashboard() {
		return View::make('users.dashboard')->with('title', 'Dashboard');
	}
}