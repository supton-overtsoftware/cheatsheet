<form class="form" method="post" action="<?php echo site_url('entries/add') ?>">
	<div class="form-group">
		<label for="title">Title</label>
		<input id="title" name="title" placeholder="Title" class="form-control" type="text">
	</div>

	<div class="form-group">
		<label for="tags">Tags</label>
		<input id="tags" name="tags" placeholder="e.g. git,bash" class="form-control" type="text">
	</div>

	<div class="form-group">
		<label for="code">Code</label>
		<textarea id="code" name="code" class="form-control"></textarea>
	</div>

	<div class="form-group">
		<label for="description">Description</label>
		<textarea id="description" name="description" class="form-control"></textarea>
	</div>
	<button type="submit" class="btn btn-default">Add</button>
</form>
