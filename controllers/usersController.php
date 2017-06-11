<?php

class Users extends Controller
{

	public function __construct()
	{
		parent::__construct();
		if(Helper::auth(false))
			Helper::redirect(URL . LOGIN);
	}

	// LIST
	public function index()
	{
		$this->view->users = $this->model->index();
		$this->view->title = 'Users';
		$this->view->render(USERS . 'index');
	}

	// CREATE
	public function create()
	{
		if(!Helper::auth(true, 'admin'))
			Helper::redirect(URL . USERS);
		if($_SERVER['REQUEST_METHOD'] == 'POST')
			$this->model->create();
		$this->view->title = 'Create new user';
		$this->view->render(USERS . 'create');
	}

	// EDIT
	public function edit($id)
	{
		if(!Helper::auth(true, 'admin'))
			Helper::redirect(URL . USERS);
		if($_SERVER['REQUEST_METHOD'] == 'POST')
			$this->model->update($id);
		$this->view->user = $this->model->edit($id);
		$this->view->title = 'Edit';
		$this->view->render(USERS . 'edit');
	}

	// DELETE
	public function delete($id)
	{
		if(!Helper::auth(true, 'admin'))
			Helper::redirect(URL . USERS);
		$this->model->delete($id);
	}

}