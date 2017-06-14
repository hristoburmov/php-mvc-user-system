<h1>Edit</h1>
<p>Edit an already existing note.</p>
<h2>Note fields</h2>
<a class="button" href="<?php echo URL . NOTES; ?>">Back to my notes</a>
<form action="<?php echo URL . NOTES; ?>edit/<?php echo $this->note['id']; ?>" method="POST" class="form">
	<input type="text" name="title" placeholder="Title" value="<?php echo $this->note['title'] ?>">
	<textarea name="note" placeholder="Text" rows="5"><?php echo $this->note['note'] ?></textarea>
	<input type="submit" name="submit" value="Update" class="submit">
</form>