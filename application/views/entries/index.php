<script>
	ZeroClipboard.setDefaults({
		moviePath: "<?php echo site_url('res/zeroclipboard-1.3.5/ZeroClipboard.swf')?>"
	});
	$(document).ready(function() {
		var clip = new ZeroClipboard($(".clip_button"));
	});
</script>
<?php foreach ($entries as $entry) { ?>
	<div class="entry">
		<a href="<?php echo site_url('/entries/edit/' . $entry->id)  ?>"><i class="fa fa-pencil-square-o"></i></a>
		<span class="entry-title"><?php echo $entry->title ?></span>
		<?php 
			if (!empty($entry->tags)) {
				$tags = explode(',', $entry->tags);
				foreach ($tags as $tag) {
					echo '<a class="label label-default label-' . $tag .'" href="' . site_url('/entries/index/'. $tag) . '">' .$tag . '</a>';
				}
			}
		?>
		<div class="entry-content">
			<pre class="prettyprint lang-bash" id="code_<?php echo $entry->id ?>"><?php echo html_escape($entry->code) ?></pre>
			<?php 
			if (!empty($entry->description)) {
				echo '<div class="entry-desc">' . html_escape($entry->description) . '</div>';
			}
			?>
		</div>
		<button class="btn btn-default clip_button" data-clipboard-target="code_<?php echo $entry->id ?>"><i class="fa fa-files-o"></i></button>
	</div>
<?php  } ?>