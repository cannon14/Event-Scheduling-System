<?php
/**
 * Created by PhpStorm.
 * User: davidcannon
 * Date: 10/4/14
 * Time: 6:30 PM
 */

use CCCOM\Event;

class EventController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $events = Event::all();

        return View::make('events.index')->with('events', $events);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $locations = array('' => 'Select A Location') + Location::lists('name', 'location_id');
        return View::make('events.create')->with(array('locations' => $locations));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //Validation Rules
        $rules = array('event_name' => 'required', 'location_id' => 'required', 'start_dtg' => 'required', 'end_dtg' => 'required');

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            // send back all errors to the login form
            return Redirect::back()->withInput()->withErrors($validator);
        }

        //If Validation passed, create an event and assign the variables.
        $event = new Event();
        $event->event_name = Input::get('event_name', '');
        $event->user_id = Auth::user()->user_id;
        $event->location_id = Input::get('location_id', '');
        $event->description = Input::get('description', '');
        $event->start_dtg = Input::get('start_dtg', '');
        $event->end_dtg = Input::get('end_dtg', '');

        //Try and save event and report status to view.
        if ($event->save()) {
            return Redirect::to('events')->with('success', 'Event Successfully Created!');
        } else {
            return Redirect::to('events')->with('error', 'Error Creating Event! Try Again Later!');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        $event = Event::find($id);

        return View::make('events.show')->with(array('event' => $event));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        return View::make('events.edit');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {

        //Validation Rules
        $rules = array('event_name' => 'required', 'location_id' => 'required', 'start_dtg' => 'required', 'end_dtg' => 'required');

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            // send back all errors to the login form
            return Redirect::back()->withInput()->withErrors($validator);
        }

        //If Validation passed, create an event and assign the variables.
        $event = new Event();
        $event->event_name = Input::get('event_name');
        $event->location_id = Input::get('location_id');
        $event->description = Input::get('description');
        $event->start_dtg = Input::get('start_dtg');
        $event->end_dtg = Input::get('end_dtg');

        //Try and save event and report status to view.
        if ($event->save()) {
            return Redirect::to('events')->with('success', 'Event Successfully Updated!');
        } else {
            return Redirect::to('events')->with('error', 'Error Updating Event! Try Again Later!');
        }

        /*
        $event = Event::find($id);

        //If an input variable value has changed...change the corresponding event variable
        if($event->event_name != Input::get('event_name')) {
            $event->event_name = Input::get('event_name');
        }
        if($event->description != Input::get('description')) {
            $event->description = Input::get('description');
        }
        if($event->start_dtg != Input::get('start_dtg')) {
            $event->start_dtg = Input::get('start_dtg', '');
        }
        if($event->end_dtg != Input::get('end_dtg')) {
            $event->end_dtg = Input::get('end_dtg', '');
        }

        //Try and save event and report status to view.
        if ($event->save()) {
            return Redirect::to('events')->with('success', 'Event Successfully Updated!');
        } else {
            return Redirect::to('events')->with('error', 'Error Updating Event! Try Again Later!');
        }
        */
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $event = Event::find($id);

        //Try and save event and report status to view.
        if ($event->delete()) {
            return Redirect::to('events')->with('success', 'Event Successfully Deleted!');
        } else {
            return Redirect::to('events')->with('error', 'Error Deleting Event! Try Again Later!');
        }
    }
} 