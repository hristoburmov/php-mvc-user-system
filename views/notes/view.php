<h1>View</h1>
<p>More detailed version of the note.</p>
<h2><?php echo $this->note['title']; ?></h2>
<a class="button" href="<?php echo URL . NOTES; ?>">Back to my notes</a>
<a class="button" href="<?php echo URL . NOTES . 'edit/' . $this->note['id']; ?>">Edit</a>
<p><?php echo $this->note['note']; ?></p>