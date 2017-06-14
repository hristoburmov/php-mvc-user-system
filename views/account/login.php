<h1>Login</h1>
<p>Enter the system using an existing account.</p>
<form action="<?php echo URL; ?>account/login" method="POST" class="form">
	<input type="text" name="user" placeholder="Username" value="<?php echo Helper::return_value('user'); ?>" autofocus>
	<input type="password" name="pass" placeholder="Password">
	<input type="submit" name="submit" value="Login" class="submit">
</form>