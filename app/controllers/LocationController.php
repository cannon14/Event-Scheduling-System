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
		//
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

		return View::make('locations.show')->with(array('location' => $location, 'events' => $events, 'users' =>
			$users));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('locations.edit');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

} 