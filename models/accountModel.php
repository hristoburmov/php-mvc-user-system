<?php

class accountModel extends Model
{

	public function __construct()
	{
		parent::__construct();
	}

	// LOGIN
	public function login()
	{
		$query = $this->db->sql('SELECT * FROM users WHERE user = :user LIMIT 1', array(
			':user' => $_POST['user']
		));

		if($query->rowCount() > 0)
		{
			$user = $query->fetch(PDO::FETCH_ASSOC);
			if(password_verify($_POST['pass'], $user['pass']))
			{
				Session::unset_item($user['pass']);
				Session::set('auth', true);
				foreach($user as $key => $value)
					Session::set($key, $value);
				Helper::message('success', 'You have been authorized');
				Helper::redirect(URL . DASHBOARD);
			}
			else
				Helper::message('error', 'Login failed');
		}
		else
			Helper::message('error', 'Login failed');
	}

	// LOGOUT
	public function logout()
	{
		session_destroy();
		session_start();
		Helper::message('success', 'You have been logged out');
		Helper::redirect(URL . LOGIN);
	}

	// REGISTER
	public function register()
	{
		$query = $this->db->sql('SELECT user, email FROM users WHERE user = :user OR email = :email', array(
			':user' => $_POST['user'],
			':email' => $_POST['email']
		));

		// Insert new user into the database
		if(!Helper::exist($query))
		{
			$query = $this->db->insert('users', array(
				'user' => $_POST['user'],
				'pass' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
				'email' => $_POST['email']
			));

			if(empty($query->errorInfo()[2])) {
				Helper::message('success', 'You have been registered and may now log in');
				Helper::redirect(URL . LOGIN);
			}
			else
				Helper::message('error', $query->errorInfo()[2]);
		}
	}

	// SETTINGS
	public function settings()
	{
		$query = $this->db->sql('SELECT user, email FROM users WHERE (user = :user OR email = :email) AND id != :id', array(
			':user' => $_POST['user'],
			':email' => $_POST['email'],
			':id' => Session::get('id')
		));

		// Update existing user in the database
		if(!Helper::exist($query))
		{
			$fields = array(
				'user' => $_POST['user'],
				'email' => $_POST['email']
			);
			if(!empty($_POST['pass']))
				$fields['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
			$query = $this->db->update('users', $fields, 'id = ' . Session::get('id'));

			if($query->errorInfo()[2])
				Helper::message('error', $query->errorInfo()[2]);
			else {
				Session::set('user', $_POST['user']);
				Session::set('email', $_POST['email']);
				Helper::message('success', 'Settings have been saved');
			}
		}
	}

}