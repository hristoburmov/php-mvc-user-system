<h1>Users</h1>
<p>List with all the users from the database.</p>
<h2>All users</h2>
<?php if(Helper::auth(true, 'admin')): ?>
	<a class="button" href="<?php echo URL; ?>users/create">Create new user</a>
<?php endif; ?>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>User</th>
			<th>Role</th>
			<th>Email</th>
			<?php if(Helper::auth(true, 'admin')): ?>
			<th colspan="2">Actions</th>
			<?php endif; ?>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($this->users as $user) {
		echo '<tr>';
		echo '<td>' . $user['id'] . '</td>';
		echo '<td>' . $user['user'] . '</td>';
		echo '<td>' . $user['role'] . '</td>';
		echo '<td>' . $user['email'] . '</td>';
		if(Helper::auth(true, 'admin') && Session::get('id') != $user['id']):
			echo '<td><a href="' . URL . USERS . 'edit/' . $user['id'] . '">Edit</a></td>';
			echo '<td><a href="' . URL . USERS . 'delete/' . $user['id'] . '">Delete</a></td>';
		else:
			echo '<td colspan="2"></td>';
		endif;
		echo '</tr>';
	}
	?>
	</tbody>
</table>