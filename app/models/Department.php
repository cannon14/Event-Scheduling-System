<?php

/**
 * Created by PhpStorm.
 * User: davidcannon
 * Date: 10/4/14
 * Time: 5:26 PM
 */
class Department extends Eloquent
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departments';

	protected $primaryKey = 'department_id';

	public function users()
	{
		return $this->hasMany('User');
	}

}