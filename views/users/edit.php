<h1>Edit</h1>
<p>Edit an already existing user.</p>
<h2>User fields</h2>
<a class="button" href="<?php echo URL . USERS; ?>">Back to all users</a>
<form action="<?php echo URL . USERS; ?>edit/<?php echo $this->user['id']; ?>" method="POST" class="form">
	<input type="text" name="user" placeholder="Username" value="<?php echo $this->user['user']; ?>">
	<input type="email" name="email" placeholder="Email" value="<?php echo $this->user['email']; ?>">
	<input type="password" name="pass" placeholder="New password">
		<select name="role">
		<option value="default" <?php echo $this->user['role'] == 'default' ? 'selected': ''; ?>>Default</option>
		<option value="admin" <?php echo $this->user['role'] ==  'admin' ? 'selected': ''; ?>>Admin</option>
	</select>
	<input type="submit" name="submit" value="Update" class="submit">
</form>