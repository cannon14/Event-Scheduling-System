<?php

/**
 * Class SiteController
 * @author David Cannon
 * @date 20 Oct 14
 */
use CCCOM\Event;

class SiteController extends BaseController
{


	public function showIndex()
	{
		$locations = Location::all();
		$events = Event::all();

		$allEvents = [];
		foreach ($events as $e) {
			$allEvents[] = (object)array('title' => $e->event_name, 'start' => $e->start_dtg, 'end' => $e->end_dtg);
		}

		return View::make('index.index')->with(array('locations' => $locations, 'events' => json_encode($allEvents)));
	}

	public function showLogin()
	{
		return View::make('index.login');
	}

	public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array('email' => 'required|email', // make sure the username is present
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')->withErrors($validator)// send back all errors to the login form
			->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
			// create our user data for the authentication
			$userdata = array('email' => Input::get('email'), 'password' => Input::get('password'));

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				return Redirect::to('/');
			} else {
				// validation not successful, send back to form
				return Redirect::to('login')->with('error', 'Email and/or Password is incorrect!');
			}
		}
	}

	public function doLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('login')->with('success', 'Your are now logged out!');
	}
}
