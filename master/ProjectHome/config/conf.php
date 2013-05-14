<?php

	class Conf{

		static $debug = 1;

		static $databases = array(
			'default' => array(
				'host'		=> 'localhost',
				'database'	=> 'projecthome',
				'login'		=> 'root',
				'password'	=> 'root'
			)
		);

	}

	Router::connect('','announces/index');
	Router::connect('announces/:id','announces/view/id:([0-9]+)');
	Router::connect('users/:id','users/profile/id:([0-9]+)');
	//Router::connect('blog/*','posts/*');

?>