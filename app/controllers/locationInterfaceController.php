<?php
/**
 * Created by PhpStorm.
 * User: davidcannon
 * Date: 10/6/14
 * Time: 8:07 PM
 */
use CCCOM\Event;


class locationInterfaceController Extends BaseController {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    public function showInterface($id) {
        //Get data for current location
        $location = Location::find($id);
        $events = Event::where('location_id','=',$id)
            ->where('start_dtg','<=','NOW()')
            ->orderBy('start_dtg')
            ->get();

        $currentEvent = isset($events[0]) ? $events[0] : null;
        $nextEvent = isset($events[1]) ? $events[1] : null;

        return View::make('interfaces.index')->with(
            array('location'=>$location,
                'currentEvent'=>$currentEvent,
                'nextEvent'=>$nextEvent
            )
        );
    }

    public function checkDatabase($id) {

    }
} 