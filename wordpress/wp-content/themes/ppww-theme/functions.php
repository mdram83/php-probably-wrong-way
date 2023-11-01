<?php

require get_theme_file_path('/inc/ThemeSetup.php');

function ppwwPaginationLinks(): array
{
	$links = (paginate_links(['type' => 'array', 'prev_text' => 'prev', 'next_text' => 'next']));
	$filtered = array_filter($links ?? [], fn($value) => (strip_tags($value) === 'prev' || strip_tags($value) === 'next'));

	$pageLinks = [
		'prev' => null,
		'next' => null,
	];

	foreach ($filtered as $link) {
		$direction = strip_tags($link);
		$pageLinks[$direction] = $direction === 'prev' ? get_previous_posts_page_link() : get_next_posts_page_link();
	}

	return $pageLinks;
}

new PhpProbablyWrongWay\ThemeSetup();
