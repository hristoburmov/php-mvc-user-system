<?php

class Account extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	// DASHBOARD
	public function dashboard()
	{
		if(Helper::auth(false))
			Helper::redirect(URL . LOGIN);
		$this->view->title = 'Dashbaord';
		$this->view->render('account/dashboard');
	}

	// LOGIN
	public function login()
	{
		if(Helper::auth(true))
			Helper::redirect(URL . DASHBOARD);
		if($_SERVER['REQUEST_METHOD'] == 'POST')
			$this->model->login();
		$this->view->title = 'Login';
		$this->view->render('account/login');
	}

	// LOGOUT
	public function logout()
	{
		$this->model->logout();
	}

	// REGISTER
	public function register()
	{
		if(Helper::auth(true))
			Helper::redirect(URL . DASHBOARD);
		if($_SERVER['REQUEST_METHOD'] == 'POST')
			$this->model->register();
		$this->view->title = 'Register';
		$this->view->render('account/register');
	}

	// SETTINGS
	public function settings()
	{
		if(Helper::auth(false))
			Helper::redirect(URL . LOGIN);
		if($_SERVER['REQUEST_METHOD'] == 'POST')
			$this->model->settings();
		$this->view->title = 'Settings';
		$this->view->render('account/settings');
	}

}