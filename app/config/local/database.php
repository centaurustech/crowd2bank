<?php

return array(
	'connections' => array(
		'mysql' => array(
			'host'      => getenv('DB_HOST'),
			'database'  => getenv('DB_NAME'),
			'username'  => getenv('DB_USERNAME'),
			'password'  => getenv('DB_PASSWORD')
		)
	),

);
