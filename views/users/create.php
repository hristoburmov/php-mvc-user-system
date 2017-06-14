<h1>Create</h1>
<p>Create a brand new user using this form.</p>
<h2>User fields</h2>
<a class="button" href="<?php echo URL . USERS; ?>">Back to all users</a>
<form action="<?php echo URL . USERS; ?>create" method="POST" class="form">
	<input type="text" name="user" placeholder="Username" value="<?php echo Helper::return_value('user'); ?>">
	<input type="email" name="email" placeholder="Email" value="<?php echo Helper::return_value('email'); ?>">
	<input type="password" name="pass" placeholder="Password">
	<select name="role">
		<option value="default" <?php echo Helper::return_value('role') == 'default' ? 'selected': ''; ?>>Default</option>
		<option value="admin" <?php echo Helper::return_value('role') == 'admin' ? 'selected': ''; ?>>Admin</option>
	</select>
	<input type="submit" name="submit" value="Create" class="submit">
</form>