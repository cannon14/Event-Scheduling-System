<?php
/**
 * Created by PhpStorm.
 * User: davidcannon
 * Date: 10/6/14
 * Time: 8:07 PM
 */

class LocationUIController Extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    public function showLocationUI($id) {
        //Get all users.
        $users = User::all();
        //Get data for current location
        $location = Location::find($id);
        $currentEvent = Events::whereRaw('location_id = ? AND start_dtg >= NOW() ORDER BY start_dtg ASC LIMIT 1', array($id))->get();
        //Select next event)
        $nextEvent = Events::whereRaw('location_id = ? AND start_dtg > NOW() ORDER BY start_dtg ASC LIMIT 1', array($id))->get();

        //dd(DB::getQueryLog());

        return View::make('locationUI')->
        with('users', $users)->
        with('location', $location)->
        with('currentEvent', $currentEvent)->
        with('nextEvent', $nextEvent);
    }
} 