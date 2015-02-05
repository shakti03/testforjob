<?php

Class MailHelper {

	public static function sendMail($data,$view){

		Mail::send('emails.welcome', array('key' => 'value'), function($message)
		{
		    $message->to('shaktisingh03@gmail.com', 'Shakti Singh')->subject('Welcome!');
		});
	}
}