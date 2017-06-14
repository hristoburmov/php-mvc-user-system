<h1>Create</h1>
<p>Create a brand new note using this form.</p>
<h2>Note fields</h2>
<a class="button" href="<?php echo URL . NOTES; ?>">Back to my notes</a>
<form action="<?php echo URL . NOTES; ?>create" method="POST" class="form">
	<input type="text" name="title" placeholder="Title" value="<?php echo Helper::return_value('title'); ?>">
	<textarea name="note" placeholder="Text" rows="5"><?php echo Helper::return_value('note'); ?></textarea>
	<input type="submit" name="submit" value="Create" class="submit">
</form>