<h1>Edit</h1>
<p>Edit an already existing user.</p>
<h2>User fields</h2>
<a class="button" href="<?php echo URL; ?>users">Back to all users</a>
<form action="<?php echo URL; ?>users/edit/<?php echo $this->user['id']; ?>" method="POST" class="form">
	<input type="text" name="user" placeholder="Username" required value="<?php echo $this->user['user']; ?>">
	<input type="password" name="pass" placeholder="New password">
	<input type="email" name="email" placeholder="Email" required value="<?php echo $this->user['email']; ?>">
		<select name="role">
		<option value="default" <?php echo $this->user['role'] == 'default' ? 'selected': ''; ?>>Default</option>
		<option value="admin" <?php echo $this->user['role'] ==  'admin' ? 'selected': ''; ?>>Admin</option>
	</select>
	<input type="submit" name="submit" value="Update" class="submit">
</form>