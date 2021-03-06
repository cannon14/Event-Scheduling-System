<?php
/**
 * Created by PhpStorm.
 * User: davidcannon
 * Date: 10/4/14
 * Time: 5:26 PM
 */

namespace CCCOM;

class Event extends \Eloquent
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events';

	protected $primaryKey = 'event_id';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function location()
	{
		return $this->belongsTo('Location');
	}

	public function department()
	{
		return $this->belongsTo('Department');
	}

}