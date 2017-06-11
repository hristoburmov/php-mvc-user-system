<?php

class Controller
{

	public function __construct()
	{
		$this->view = new View();
	}

	// LOAD MODEL
	public function loadModel($model)
	{
		$file = MDL . $model . 'Model.php';
		$model .= 'Model';
		if(file_exists($file))
		{
			require_once $file;
			$this->model = new $model();
		}
	}

}