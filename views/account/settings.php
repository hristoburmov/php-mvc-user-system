<h1>Settings</h1>
<p>Don't like something about yourself? Change it now!</p>
<form action="<?php echo URL; ?>account/settings" method="POST" class="form">
	<h2>Username</h2>
	<input type="text" name="user" placeholder="Username" value="<?php echo Session::get('user'); ?>">
	<h2>Password</h2>
	<input type="password" name="pass" placeholder="New password">
	<h2>Email</h2>
	<input type="email" name="email" placeholder="Email" value="<?php echo Session::get('email'); ?>">
	<input type="submit" name="submit" value="Update" class="submit">
</form>