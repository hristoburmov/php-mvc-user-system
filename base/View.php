<?php

class View
{

	public function __construct()
	{
		
	}

	// RENDER
	public function render($view) {
		require_once VIEW . 'header.php';
		require_once VIEW . $view . '.php';
		require_once VIEW . 'footer.php';
	}

}