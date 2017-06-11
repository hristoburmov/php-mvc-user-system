<div class="container">
	<h1>Dashboard</h1>
	<p>Hello and welcome to the dashboard page, where you can see some info about yourself.</p>
	<ul>
		<li><strong>ID</strong> <?php echo Session::get('id'); ?></li>
		<li><strong>User</strong> <?php echo Session::get('user'); ?></li>
		<li><strong>Role</strong> <?php echo Session::get('role'); ?></li>
		<li><strong>Email</strong> <?php echo Session::get('email'); ?></li>
	</ul>
</div>