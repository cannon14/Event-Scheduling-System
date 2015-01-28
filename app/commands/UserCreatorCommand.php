<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class UserCreatorCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new user for access to API';

	/**
	 * Create a new command instance.
	 *
	 * @return \UserCreatorCommand
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire() {
		$username = $this->argument('username');
		$password = $this->argument('password');
        $acl_id = $this->argument('acl_id');

		$user = new User();
		$user->username = $username;
		$user->password = Hash::make($password);
        $user->acl_id = $acl_id;
		$user->save();

		$this->info("User <fg=white>{$username}</fg=white> was created");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments() {
		return array(
			array('username', InputArgument::REQUIRED, 'Desired username'),
			array('password', InputArgument::REQUIRED, 'Desired password'),
            array('acl_id', InputArgument::REQUIRED, 'Desired Access Control List Id')
		);
	}

}
