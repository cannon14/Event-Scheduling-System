<?php

/**
 * Class SiteController
 * @author David Cannon
 * @date 20 Oct 14
 */
class SiteController extends BaseController {


	public function showIndex() {
		return View::make('index.index');
	}

	public function showLogin() {
		return View::make('index.login');
	}

	public function doLogin() {
		// validate the info, create rules for the inputs
		$rules = array('username' => 'required|min:3', // make sure the username is present
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')->withErrors($validator)// send back all errors to the login form
			->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		}
		else {
			// create our user data for the authentication
			$userdata = array('username' => Input::get('username'), 'password' => Input::get('password'));

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				return Redirect::to('/');
			}
			else {
				// validation not successful, send back to form
				return Redirect::to('login')->with('error', 'Username and/or Password is incorrect!');
			}
		}
	}

	public function doLogout() {
		Auth::logout(); // log the user out of our application
		return Redirect::to('login')->with('success', 'Your are now logged out!');
	}

	/**
	 * Show help/documentation for the application.
	 * @return mixed
	 */
	public function showHelp() {
		return View::make('static.help');
	}

	/**
	 * Flush all cached data.
	 * @return mixed
	 */
	public function flushCache() {
		Cache::flush();

		return Redirect::back()->with('success', 'Cached has been flushed!');
	}

	/**
	 * Sometimes an error might occur that won't allow the job to get to 100%, so it must be deleted.  This only deletes
	 * the job from the database, not the daemon.  You must let that run its course.
	 * @return mixed
	 */
	public function deleteAllJobs() {
		$jobs = Job::all();

		foreach($jobs as $job) {
			$job->delete();
		}

		return Redirect::back()->with('success', 'All Jobs Have Been Deleted!');
	}
}
