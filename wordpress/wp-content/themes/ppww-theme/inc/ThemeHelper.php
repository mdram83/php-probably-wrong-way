<?php

namespace PhpProbablyWrongWay;

class ThemeHelper
{
	public static function getPaginationLinks(): array
	{
		$paginationLinksPrevNext = array_filter(
			paginate_links(['type' => 'array', 'prev_text' => 'prev', 'next_text' => 'next']) ?? [],
			fn($value) => (strip_tags($value) === 'prev' || strip_tags($value) === 'next')
		);

		$resultingLinks = [
			'prev' => null,
			'next' => null,
		];

		foreach ($paginationLinksPrevNext as $link) {
			$direction = strip_tags($link);
			$resultingLinks[$direction] = $direction === 'prev' ? get_previous_posts_page_link() : get_next_posts_page_link();
		}

		return $resultingLinks;
	}

	public static function getCurrentPostRelatedProjects(): array
	{
		$relatedProjects = get_field('related_project');
		if ($relatedProjects == '') {
			$relatedProjects = [];
		}
		return $relatedProjects;
	}

	public static function loopQueryResultsThroughTemplatePart(
		array $queryParams,
		string $partSlug,
		string $partName = null): void
	{
		$WPQuery =new \WP_Query($queryParams);
		while ($WPQuery->have_posts()) {
			$WPQuery->the_post();
			get_template_part($partSlug, $partName);
		}
		wp_reset_postdata();
	}
}
