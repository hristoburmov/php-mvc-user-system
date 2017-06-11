<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title; ?> | MVC User System</title>
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css">
</head>
<body>
	<header>
		<div class="wrap">
		<h1 id="logo"><a href="<?php echo URL; ?>">MVC User System</a></h1>
			<nav id="main">
				<ul>
					<?php if(Helper::auth()) { ?>
					<li><a href="<?php echo URL . DASHBOARD; ?>">Dashboard</a></li>
					<li><a href="<?php echo URL; ?>users">Users</a></li>
					<li><a href="<?php echo URL; ?>account/settings">Settings</a></li>
					<li><a href="<?php echo URL; ?>account/logout">Logout</a></li>
					<?php } else { ?>
					<li><a href="<?php echo URL; ?>">Home</a></li>
					<li><a href="<?php echo URL . LOGIN; ?>">Login</a></li>
					<li><a href="<?php echo URL; ?>account/register">Register</a></li>
					<?php } ?>
				</ul>
			</nav>
		</div>
	</header>
	<div class="wrap" id="content">
		<?php
		if(Session::get('message')) {
			echo '<div class="message ' . Session::get('type') . '">' . Session::get('message') . '</div>';
			unset($_SESSION['type'], $_SESSION['message']);
		}
		?>