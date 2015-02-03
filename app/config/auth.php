<?php

return array(

    'multi' => array(
        'administrator' => array(
            'driver' => 'eloquent',
            'model' => 'Administrator'
        ),
        'user' => array(
            'driver' => 'database',
            'table' => 'users'
        )
    ),


	/*
	|--------------------------------------------------------------------------
	| Password Reminder Settings
	|--------------------------------------------------------------------------
	|
	| Here you may set the settings for password reminders, including a view
	| that should be used as your password reminder e-mail. You will also
	| be able to set the name of the table that holds the reset tokens.
	|
	| The "expire" time is the number of minutes that the reminder should be
	| considered valid. This security feature keeps tokens short-lived so
	| they have less time to be guessed. You may change this as needed.
	|
	*/

	'reminder' => array(

		'email' => 'emails.auth.reminder',

		'table' => 'password_reminders',

		'expire' => 60,

	),

);
