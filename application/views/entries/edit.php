<form class="form" method="post" action="<?php echo site_url('entries/edit') ?>">
	<input type="hidden" name="id" value="<?php echo $entry->id ?>">
	<div class="form-group">
		<label for="title">Title</label>
		<input id="title" name="title" placeholder="Title" class="form-control" type="text" value="<?php echo $entry->title ?>">
	</div>

	<div class="form-group">
		<label for="tags">Tags</label>
		<input id="tags" name="tags" placeholder="e.g. git,bash" class="form-control" type="text" value="<?php echo $entry->tags ?>">
	</div>

	<div class="form-group">
		<label for="code">Code</label>
		<textarea id="code" name="code" class="form-control"><?php echo $entry->code ?></textarea>
	</div>

	<div class="form-group">
		<label for="description">Description</label>
		<textarea id="description" name="description" class="form-control"><?php echo $entry->description ?></textarea>
	</div>
	<button type="submit" class="btn btn-default">Add</button>
</form>
