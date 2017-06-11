<?php

// URLs
define('URL', 'http://localhost/mvc-user-system/'); // http://178.75.255.150/mvc-user-system/
define('LOGIN', 'account/login');
define('DASHBOARD', 'dashboard/');
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
define('DB_PASS', ''); // Br68aJN1fQ12
define('DB_NAME', 'mvc-user-system');

// Autoloader
spl_autoload_register(function($class) {
	require_once BASE . $class . '.php';
});

// App
$app = new Bootstrap();