<?php

class Helper
{

	// AUTH
	public static function auth($auth, $role = NULL)
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
		$_SESSION['messages'][] = array(
			'type' => $type,
			'message' => $message
		);
	}

	// RETURN VALUE
	public static function return_value($field)
	{
		if(isset($_POST[$field]))
			return $_POST[$field];
		else
			return false;
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
				if($user['user'] == strtolower($_POST['user']) && $user['email'] == strtolower($_POST['email']))
					$error = 'Username AND email already exist';
				else if($user['user'] == strtolower($_POST['user']))
					$error = 'Username already exists';
				else if($user['email'] == strtolower($_POST['email']))
					$error = 'Email already exists';
			}
			Helper::message('error', $error);
			return true;
		}
		return false;
	}

	// VALIDATION
	public static function validate($fields)
	{
		foreach($fields as $type => $field)
			Helper::_validate($type, $field);
		if(Session::get('messages'))
			return false;
		return true;
	}

	private static function _validate($type, $field)
	{
		switch($type)
		{
			case 'user':
				$input = 'Username';
				$min = 3;
				$max = 30;
				$regex = '/^[a-zA-Z0-9]+$/'; //'/[^a-z0-9]/i';
				$contain = 'A-Z, a-z, 0-9';
				break;
			case 'pass':
				$input = 'Password';
				$min = 8;
				$max = 30;
				$regex = '/^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{8,30}$/';
				$contain = 'at least 1 lowercase, 1 uppercase and 1 number';
				break;
			case 'email':
				$input = 'Email';
				$min = 8;
				$max = 64;
				break;
			case 'title':
				$input = 'Title';
				$min = 3;
				$max = 50;
				break;
			case 'note':
				$input = 'Note';
				$min = 5;
				$max = 1000;
				break;
		}
		$range = Helper::_length($field, $min, $max);
		if(!$range)
			Helper::message('error', "<strong>$input</strong> must be $min-$max characters long");
		else if($type == 'email' && !filter_var($field, FILTER_VALIDATE_EMAIL))
			Helper::message('error', "<strong>$input</strong> not valid");
		else if(isset($regex) && !preg_match($regex, $field))
			Helper::message('error', "<strong>$input</strong> must contain $contain");
	}

	private static function _length($field, $min, $max)
	{
		$length = strlen(utf8_decode($field));
		if($length >= $min && $length <= $max)
			return true;
		return false;
	}

}