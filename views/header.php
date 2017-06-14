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
					<?php if(Helper::auth(true)): ?>
					<li><a href="<?php echo URL . DASHBOARD; ?>">Dashboard</a></li>
					<li><a href="<?php echo URL . NOTES; ?>">Notes</a></li>
					<li><a href="<?php echo URL . USERS; ?>">Users</a></li>
					<li><a href="<?php echo URL; ?>account/settings">Settings</a></li>
					<li><a href="<?php echo URL; ?>account/logout">Logout</a></li>
					<?php else: ?>
					<li><a href="<?php echo URL; ?>">Home</a></li>
					<li><a href="<?php echo URL . LOGIN; ?>">Login</a></li>
					<li><a href="<?php echo URL; ?>account/register">Register</a></li>
					<?php endif; ?>
				</ul>
			</nav>
		</div>
	</header>
	<div class="wrap" id="content">
		<?php
		if(isset($_SESSION['messages'])) {
			echo '<div id="messages">';
			foreach($_SESSION['messages'] as $message)
				echo '<div class="message ' . $message['type'] . '">' . $message['message'] . '</div>';
			echo '</div>';
			unset($_SESSION['messages']);
		}
		?>