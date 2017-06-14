<?php

class NotesModel extends Model
{

	public function __construct()
	{
		parent::__construct();
	}

	// LIST
	public function index()
	{
		return $query = $this->db->sql('SELECT notes.id, user, title, LEFT(note, 50) AS note FROM notes JOIN users ON notes.id_user = users.id WHERE users.id = ' . Session::get('id'));
	}

	// VIEW
	public function view($id)
	{
		$query = $this->db->sql('SELECT * FROM notes WHERE id = :id', array(
			':id' => $id
		));

		if($query->rowCount() == 0)
		{
			Helper::message('error', 'No such note exists to be VIEWED');
			Helper::redirect(URL . NOTES);
		}
		$note = $query->fetch(PDO::FETCH_ASSOC);
		if($note['id_user'] != Session::get('id')) {
			Helper::message('error', 'You are not the owner of that note');
			Helper::redirect(URL . NOTES);
		}
		return $note;
	}

	// CREATE
	public function create()
	{
		$validate = Helper::validate(array(
			'title' => $_POST['title'],
			'note' => $_POST['note']
		));
		if($validate)
		{
			// Insert new note into the database
			$query = $this->db->insert('notes', array(
				'id_user' => Session::get('id'),
				'title' => $_POST['title'],
				'note' => $_POST['note']
			));

			if(empty($query->errorInfo()[2]))
			{
				Helper::message('success', 'New note has been CREATED');
				Helper::redirect(URL . NOTES);
			}
			else
				Helper::message('error', $query->errorInfo()[2]);
		}
	}

	// EDIT
	public function edit($id)
	{
		$query = $this->db->sql('SELECT * FROM notes WHERE id = :id', array(
			':id' => $id
		));

		if($query->rowCount() == 0)
		{
			Helper::message('error', 'No such note exists to be EDITED');
			Helper::redirect(URL . NOTES);
		}
		$note = $query->fetch(PDO::FETCH_ASSOC);
		if($note['id_user'] != Session::get('id')) {
			Helper::message('error', 'You are not the owner of that note');
			Helper::redirect(URL . NOTES);
		}
		return $note;
	}

	// EDIT - UPDATE
	public function update($id)
	{
		$query = $this->db->sql('SELECT * FROM notes WHERE id = :id', array(
			':id' => $id
		));

		if($query->rowCount() == 0)
		{
			Helper::message('error', 'No such note exists to be EDITED');
			Helper::redirect(URL . NOTES);
		}
		$note = $query->fetch(PDO::FETCH_ASSOC);
		if($note['id_user'] != Session::get('id')) {
			Helper::message('error', 'You are not the owner of that note');
			Helper::redirect(URL . NOTES);
		}

		$validate = Helper::validate(array(
			'title' => $_POST['title'],
			'note' => $_POST['note']
		));
		if($validate)
		{
			$fields = array(
				'title' => $_POST['title'],
				'note' => $_POST['note']
			);
			$query = $this->db->update('notes', $fields, "id = $id");

			if(empty($query->errorInfo()[2]))
			{
				Helper::message('success', 'Note has been UPDATED');
				Helper::redirect(URL . NOTES);
			}
			else
				Helper::message('error', $query->errorInfo()[2]);
		}
	}

	// DELETE
	public function delete($id)
	{
		$query = $this->db->sql('SELECT * FROM notes WHERE id = :id', array(
			':id' => $id
		));

		if($query->rowCount() == 0)
		{
			Helper::message('error', 'No such note exists to be DELETED');
			Helper::redirect(URL . NOTES);
		}
		$note = $query->fetch(PDO::FETCH_ASSOC);
		if($note['id_user'] != Session::get('id')) {
			Helper::message('error', 'You are not the owner of that note');
			Helper::redirect(URL . NOTES);
		}

		$query = $this->db->sql('DELETE FROM notes WHERE id = :id', array(
			':id' => $id
		));

		if($query->rowCount() > 0)
			Helper::message('success', 'Note has been DELETED');
		else
			Helper::message('error', 'No such note exists to be DELETED');
		Helper::redirect(URL . NOTES);
	}

}