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
	$output .= '<pre class="prettyprint lang-bash">' . html_escape($entry->code) . '</pre>';
	if (!empty($entry->description)) {
		$output .= '<div class="entry-desc">' . html_escape($entry->description) . '</div>';
	}
	echo $output . '</div>';
}
