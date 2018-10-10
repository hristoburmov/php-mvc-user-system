<?php

// URLs
define('URL', 'https://burmov.eu/demos/mvc-user-system/');
define('LOGIN', 'account/login');
define('DASHBOARD', 'account/dashboard');
define('NOTES', 'notes/');
define('USERS', 'users/');

// Paths
define('BASE', 'base/');
define('CTRL', 'controllers/');
define('MDL', 'models/');
define('VIEW', 'views/');

// Database
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mvc_user_system');

// Autoloader
spl_autoload_register(function($class) {
	require_once BASE . $class . '.php';
});

// App
$app = new Bootstrap();