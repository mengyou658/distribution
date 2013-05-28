<?php

/**
 * Actors model config
 */

return array(

	'title' => '用户',

	'single' => 'user',

	'model' => 'User',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
        
		'username' => array(
			'title' => 'Username',
			'select' => "(:table).username",
		),

		'email' => array(
			'title' => 'E-mail',
			'select' => "(:table).email",
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
        
		'username' => array(
			'title' => 'Username',
		),
        
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
    
		'username' => array(
			'title' => 'Username',
			'type' => 'text',
		),
        
	),

);