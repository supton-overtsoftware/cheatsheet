<script>
	ZeroClipboard.setDefaults({
		moviePath: "<?php echo site_url('res/zeroclipboard-1.3.5/ZeroClipboard.swf')?>"
	});
	$(document).ready(function() {
		var clip = new ZeroClipboard($(".clip_button"));
	});
</script>
<?php
foreach ($entries as $entry) {
	$output = '<div class="entry"><a href="' . site_url('/entries/edit/' . $entry->id) . '"><i class="fa fa-pencil-square-o"></i></a>' .
			'<span class="entry-title">' . $entry->title . '</span> ';
	
	if (!empty($entry->tags)) {
		$tags = explode(',', $entry->tags);
		foreach ($tags as $tag) {
			$output .= '<a class="label label-default label-' . $tag .'" href="' . site_url('/entries/index/'. $tag) . '">' .$tag . '</a>';
		}
	}
	$output .= '<div><pre class="prettyprint lang-bash" id="code_' . $entry->id . '">' . html_escape($entry->code) . '</pre>';
	$output .= '<button class="btn btn-default clip_button" data-clipboard-target="code_' . $entry->id . '"><i class="fa fa-files-o"></i></button></div>';
	if (!empty($entry->description)) {
		$output .= '<div class="entry-desc">' . html_escape($entry->description) . '</div>';
	}
	echo $output . '</div>';
}
