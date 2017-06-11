<?php

class UsersModel extends Model
{

	public function __construct()
	{
		parent::__construct();
	}

	// LIST
	public function index()
	{
		return $query = $this->db->sql('SELECT id, user, role, email FROM users');
	}

	// CREATE
	public function create()
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
				'email' => $_POST['email'],
				'role' => $_POST['role']
			));

			if(empty($query->errorInfo()[2]))
			{
				Helper::message('success', 'New user has been CREATED');
				Helper::redirect(URL . USERS);
			}
			else
				Helper::message('error', $query->errorInfo()[2]);
		}
	}

	// EDIT
	public function edit($id)
	{
		if($id == Session::get('id'))
			Helper::redirect(URL . USERS);
		$query = $this->db->sql('SELECT id, user, role, email FROM users WHERE id = :id', array(
			':id' => $id
		));

		if($query->rowCount() == 0)
		{
			Helper::message('error', 'No such user exists to be EDITED');
			Helper::redirect(URL . USERS);
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	// (EDIT) UPDATE
	public function update($id)
	{
		if($id == Session::get('id'))
			Helper::redirect(URL . USERS);
		$query = $this->db->sql('SELECT user, email FROM users WHERE (user = :user OR email = :email) AND id != :id', array(
			':user' => $_POST['user'],
			':email' => $_POST['email'],
			':id' => $id
		));

		// Update existing user in the database
		if(!Helper::exist($query))
		{
			$fields = array(
				'user' => $_POST['user'],
				'email' => $_POST['email'],
				'role' => $_POST['role']
			);
			if(!empty($_POST['pass']))
				$fields['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
			$query = $this->db->update('users', $fields, "id = $id");

			if(empty($query->errorInfo()[2]))
			{
				Helper::message('success', 'User has been UPDATED');
				Helper::redirect(URL . USERS);
			}
			else
				Helper::message('error', $query->errorInfo()[2]);
		}
	}

	// DELETE
	public function delete($id)
	{
		if($id == Session::get('id'))
			Helper::redirect(URL . USERS);
		$query = $this->db->sql('DELETE FROM users WHERE id = :id', array(
			':id' => $id
		));

		if($query->rowCount() > 0)
			Helper::message('success', 'User has been DELETED');
		else
			Helper::message('error', 'No such user exists to be DELETED');
		Helper::redirect(URL . USERS);
	}

}