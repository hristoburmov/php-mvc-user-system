<h1>Create</h1>
<p>Create a brand new user using this form.</p>
<h2>User fields</h2>
<a class="button" href="<?php echo URL; ?>users">Back to all users</a>
<form action="<?php echo URL; ?>users/create" method="POST" class="form">
	<input type="text" name="user" placeholder="Username" required value="<?php echo Helper::return_value('user'); ?>">
	<input type="password" name="pass" placeholder="Password" required>
	<input type="email" name="email" placeholder="Email" required value="<?php echo Helper::return_value('email'); ?>">
	<select name="role">
		<option value="default" <?php echo Helper::return_value('role') == 'default' ? 'selected': ''; ?>>Default</option>
		<option value="admin" <?php echo Helper::return_value('role') == 'admin' ? 'selected': ''; ?>>Admin</option>
	</select>
	<input type="submit" name="submit" value="Create" class="submit">
</form>