<h1>Register</h1>
<p>Make a new account for yourself to use.</p>
<form action="<?php echo URL; ?>account/register" method="POST" class="form">
	<input type="text" name="user" placeholder="Username" value="<?php echo Helper::return_value('user'); ?>" autofocus>
	<input type="email" name="email" placeholder="Email" value="<?php echo Helper::return_value('email'); ?>">
	<input type="password" name="pass" placeholder="Password">
	<input type="submit" name="submit" value="Register" class="submit">
</form>