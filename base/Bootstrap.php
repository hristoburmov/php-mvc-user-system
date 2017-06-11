<?php

class Bootstrap
{

	public function __construct()
	{
		session_start();

		// URL
		// [0] - Controller
		// [1] - Method
		// [2] - Parameter
		$url = (isset($_GET['url'])) ? explode('/', rtrim(filter_var($_GET['url'], FILTER_SANITIZE_URL), '/')) : null;

		// Set default, if no value for controller or method
		if(!isset($url[0]))
			$url[0] = 'home';
		if(!isset($url[1]))
			$url[1] = 'index';

		// Check if controller exists
		$file = CTRL . $url[0] . 'Controller.php';
		if(file_exists($file))
			require_once $file;
		else
		{
			$this->error('No such controller!');
			exit;
		}

		// Init controller and load model (if any)
		$controller = new $url[0]();
		$controller->loadModel($url[0]);

		// Check if method exists
		if(method_exists($controller, $url[1]))
		{
			if(isset($url[2]))
				$controller->{$url[1]}($url[2]);
			else if(isset($url[1]))
				$controller->{$url[1]}();
		}
		else
			$this->error('No such method!');
	}

	private function error($error)
	{
		require_once CTRL . 'errorController.php';
		$controller = new CustomError();
		$controller->index($error);
	}

}