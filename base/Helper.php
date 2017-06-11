<?php

class Helper
{

	public function __construct()
	{

	}

	// AUTHORIZATION
	public static function auth($auth = true, $role = NULL)
	{
		if(Session::get('auth') != $auth)
			return false;
		if(isset($role) && Session::get('role') != $role)
			return false;
		return true;
	}

	// REDIRECT
	public static function redirect($url)
	{
		header("Location: $url");
		exit;
	}

	// MESSAGE
	public static function message($type, $message)
	{
		Session::set('type', $type);
		Session::set('message', $message);
	}

	// RETURN VALUE
	public static function return_value($field)
	{
		if(isset($_POST[$field]))
			return $_POST[$field];
		else
			return '';
	}

	// EXIST
	public static function exist($query)
	{
		// Existing usernames and emails errors
		if($query->rowCount() > 0)
		{
			if($query->rowCount() == 2)
				$error = 'Username AND email already exist';
			else
			{
				$user = $query->fetch(PDO::FETCH_ASSOC);
				if($user['user'] == $_POST['user'] && $user['email'] == $_POST['email'])
					$error = 'Username AND email already exist';
				else if($user['user'] == $_POST['user'])
					$error = 'Username already exists';
				else if($user['email'] == $_POST['email'])
					$error = 'Email already exists';
			}
			Helper::message('error', $error);
			return true;
		}
		return false;
	}

}