<?php

namespace PhpProbablyWrongWay;

class ThemeConfig
{
	private static int $homepagePostsPerPage = 3;
	private static int $homepageProjectsPerPage = 3;
	private static int $homepageInspirationsPerPage = 2;
	private static array $projectsQueryParams = [
		'post_type' => 'project',
		'meta_query' => [
			'relation' => 'AND',
			'featured_clause' => [
				'key'     => 'featured',
				'compare' => 'EXISTS',
			],
			'start_date_clause' => [
				'key'     => 'start_date',
				'compare' => 'EXISTS',
			],
		],
		'orderby' => [
			'featured_clause' => 'DESC',
			'start_date_clause' => 'ASC',
		],
	];

	public static function getHomepagePostsPerPage(): int
	{
		return static::$homepagePostsPerPage;
	}

	public static function getHomepageProjectsPerPage(): int
	{
		return static::$homepageProjectsPerPage;
	}

	public static function getHomepageInspirationsPerPage(): int
	{
		return static::$homepageInspirationsPerPage;
	}

	public static function getProjectsQueryParams(): array
	{
		return static::$projectsQueryParams;
	}
}
