<h1>Notes</h1>
<p>List with all your notes from the database.</p>
<h2>My notes</h2>
<a class="button" href="<?php echo URL . NOTES; ?>create">Create new note</a>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Note</th>
			<th colspan="3">Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($this->notes as $note) {
		echo '<tr>';
		echo '<td>' . $note['id'] . '</td>';
		echo '<td>' . $note['title'] . '</td>';
		echo '<td>' . $note['note'] . '...</td>';
		echo '<td><a href="' . URL . NOTES . 'view/' . $note['id'] . '">View</a></td>';
		echo '<td><a href="' . URL . NOTES . 'edit/' . $note['id'] . '">Edit</a></td>';
		echo '<td><a href="' . URL . NOTES . 'delete/' . $note['id'] . '">Delete</a></td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>