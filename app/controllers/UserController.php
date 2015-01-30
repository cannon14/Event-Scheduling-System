<?php

/**
 * Created by PhpStorm.
 * User: davidcannon
 * Date: 10/4/14
 * Time: 6:30 PM
 */
class UserController extends BaseController
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return View::make('users.index')->with(array('users' => $users));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$departments = array('' => 'Select A Department') + Department::lists('department_name', 'department_id');

		return View::make('users.create')->with(array('departments' => $departments));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Validation Rules
		$rules = array('title' => 'required', 'department_id' => 'required', 'firstname' => 'required', 'lastname' => 'required', 'email' => 'required', 'password1' => 'required|alphaNum|min:3|same:confirm_password', // password can only be alphanumeric and
			// has to be greater than 3 characters
			'confirm_password' => 'required|alphaNum|min:3');

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			// send back all errors to the login form
			return Redirect::back()->withInput()->withErrors($validator);
		}

		//If Validation passed, create an event and assign the variables.
		$user = new User();
		$user->title = Input::get('title', '');
		$user->department_id = Input::get('department_id', '');
		$user->firstname = Input::get('firstname', '');
		$user->lastname = Input::get('lastname', '');
		$user->email = Input::get('email', '');
		$user->password = Hash::make(Input::get('password1', ''));
		$user->telephone = Input::get('telephone', '');

		//Try and save event and report status to view.
		if ($user->save()) {
			return Redirect::to('users')->with('success', 'User Successfully Created!');
		} else {
			return Redirect::to('users')->with('error', 'Error Creating User! Try Again Later!');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id)
	{
		$users = User::find($id);

		return View::make('users.show')->with(array('users' => $users));

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		$departments = array('' => 'Select A Department') + Department::lists('department_name', 'department_id');

		return View::make('users.edit')->with(array('user' => $user, 'departments' => $departments));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		//Validation Rules
		$rules = array('title' => 'required', 'department_id' => 'required', 'firstname' => 'required', 'lastname' => 'required', 'email' => 'required');

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			// send back all errors to the login form
			return Redirect::back()->withInput()->withErrors($validator);
		}

		//If Validation passed, create an event and assign the variables.
		$user = new User();
		$user->title = Input::get('title', '');
		$user->department_id = Input::get('department_id');
		$user->firstname = Input::get('firstname');
		$user->lastname = Input::get('lastname');
		$user->email = Input::get('email');
		$password = Input::get('password1', '');
		if ($password != '') {
			$user->password = Hash::make(Input::get('password1'));
		}
		$user->telephone = Input::get('telephone');

		//Try and save event and report status to view.
		if ($user->save()) {
			return Redirect::to('users')->with('success', 'User Successfully Updated!');
		} else {
			return Redirect::to('users')->with('error', 'Error Updating User! Try Again Later!');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);

		//Try and save event and report status to view.
		if ($user->delete()) {
			return Redirect::to('users')->with('success', 'User Successfully Deleted!');
		} else {
			return Redirect::to('users')->with('error', 'User Deleting Event! Try Again Later!');
		}
	}
} 