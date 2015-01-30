<?php

/**
 * Created by PhpStorm.
 * User: davidcannon
 * Date: 10/4/14
 * Time: 6:30 PM
 */
use CCCOM\Event;

class LocationController extends BaseController
{

	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.master';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$locations = Location::all();

		return View::make('locations.index')->with(array('locations' => $locations));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('locations.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Validation Rules
		$rules = array('location_name' => 'required');

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			// send back all errors to the login form
			return Redirect::back()->withInput()->withErrors($validator);
		}

		//If Validation passed, create an event and assign the variables.
		$location = new Location();
		$location->location_name = Input::get('location_name', '');
		$location->location_capacity = Input::get('location_capacity', '');

		//Try and save event and report status to view.
		if ($location->save()) {
			return Redirect::to('locations')->with('success', 'Location Successfully Created!');
		} else {
			return Redirect::to('locations')->with('error', 'Error Creating Location! Try Again Later!');
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
		$location = Location::find($id);
		$users = User::all();
		$events = Event::where('location_id', '=', $id)->where('end_dtg', '>', 'NOW()')->get();

		//dd(DB::getQueryLog());

		return View::make('locations.show')->with(array('location' => $location, 'events' => $events, 'users' => $users));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		$location = Location::find($id);

		return View::make('locations.edit')->with(array('location' => $location));
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
		$rules = array('location_name' => 'required');

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			// send back all errors to the login form
			return Redirect::back()->withInput()->withErrors($validator);
		}

		//If Validation passed, create an event and assign the variables.
		$location = Location::find($id);
		$location->location_name = Input::get('location_name');
		$location->location_capacity = Input::get('location_capacity');

		//Try and save event and report status to view.
		if ($location->save()) {
			return Redirect::to('locations')->with('success', 'Location Successfully Updated!');
		} else {
			return Redirect::to('locations')->with('error', 'Error Updating Location! Try Again Later!');
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
		$location = Location::find($id);

		//Try and save event and report status to view.
		if ($location->delete()) {
			return Redirect::to('locations')->with('success', 'Location Successfully Deleted!');
		} else {
			return Redirect::to('locations')->with('error', 'Error Deleting Location! Try Again Later!');
		}
	}

} 