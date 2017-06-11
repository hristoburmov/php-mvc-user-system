<?php

class CustomError extends Controller {

	function __construct() {
		parent::__construct();
	}

	public function index($error) {
		$this->view->title = 'Error';
		$this->view->message = $error;
		$this->view->render('error/index');
	}

}