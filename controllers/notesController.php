<?php

class Notes extends Controller
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
		$this->view->notes = $this->model->index();
		$this->view->title = 'Notes';
		$this->view->render(NOTES . 'index');
	}

	// VIEW
	public function view($id)
	{
		$this->view->note = $this->model->view($id);
		$this->view->title = $this->view->note['title'];
		$this->view->render(NOTES . 'view');
	}

	// CREATE
	public function create()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
			$this->model->create();
		$this->view->title = 'Create new note';
		$this->view->render(NOTES . 'create');
	}

	// EDIT
	public function edit($id)
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
			$this->model->update($id);
		$this->view->note = $this->model->edit($id);
		$this->view->title = 'Edit';
		$this->view->render(NOTES . 'edit');
	}

	// DELETE
	public function delete($id)
	{
		$this->model->delete($id);
	}

}