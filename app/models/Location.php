<?php
/**
 * Created by PhpStorm.
 * User: davidcannon
 * Date: 10/4/14
 * Time: 5:26 PM
 */

class Location extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations';

    protected $primaryKey = 'location_id';

    public function event() {
        return $this->belongsTo('Event');
    }

    public function events() {
        return $this->belongsToMany('Event');
    }
}