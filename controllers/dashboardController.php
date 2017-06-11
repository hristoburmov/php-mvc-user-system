<?php

class Dashboard extends Controller
{

	public function __construct()
	{
		parent::__construct();
		if(Helper::auth(false))
			Helper::redirect(URL . LOGIN);
	}

	public function index()
	{
		$this->view->title = 'Dashboard';
		$this->view->render('dashboard/index');
	}

}