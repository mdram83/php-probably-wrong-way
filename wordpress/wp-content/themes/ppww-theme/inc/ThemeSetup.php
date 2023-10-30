<?php

namespace PhpProbablyWrongWay;

class ThemeSetup
{
    public function __construct()
    {
	    add_action('after_setup_theme', [$this, 'enableThemeFeatures']);
		add_action('wp_loaded', [$this, 'hideAdminBarForGuestsAndMobile']);
        add_action('wp_head', [$this, 'moveAdminBarToBottom']);
        add_action('wp_enqueue_scripts', [$this, 'loadThemeFiles']);
		add_action('init', [$this, 'customThemePostTypes']);
    }

    public function hideAdminBarForGuestsAndMobile(): void
    {
        if (!is_user_logged_in() || wp_is_mobile()) {
            show_admin_bar(false);
        }
    }

    public function moveAdminBarToBottom(): void
    {
        if (!is_admin_bar_showing()) {
            return;
        }
        wp_enqueue_style('ppww-admin-bar-bottom-style', get_theme_file_uri('/assets/css/admin-bar-bottom.css'));
    }

    public function loadThemeFiles(): void
    {
        wp_enqueue_style('ppww-main-style', get_theme_file_uri('/assets/css/main.css'));

        wp_enqueue_script('ppww-jquery-min-script', get_theme_file_uri('/assets/js/jquery.min.js'), [], '1.0', true);
        wp_enqueue_script('ppww-browser-min-script', get_theme_file_uri('/assets/js/browser.min.js'), [], '1.0', true);
        wp_enqueue_script('ppww-breakpoints-min-script', get_theme_file_uri('/assets/js/breakpoints.min.js'), [], '1.0', true);
        wp_enqueue_script('ppww-util-script', get_theme_file_uri('/assets/js/util.js'), [], '1.0', true);
        wp_enqueue_script('ppww-main-script', get_theme_file_uri('/assets/js/main.js'), [], '1.0', true);
    }

    public function enableThemeFeatures(): void
    {
        add_theme_support('title-tag');
	    add_theme_support('post-thumbnails');
	    add_image_size('index', 1500, 350, true);
    }

	public function customThemePostTypes(): void
	{
		$this->registerInspirationPostType();
		$this->registerProjectPostType();
	}

	private function registerInspirationPostType(): void
	{
		register_post_type('inspiration', [
			'supports' => ['title', 'editor', 'thumbnail'],
			'rewrite' => ['slug' => 'inspirations'],
			'has_archive' => true,
			'public' => true,
			'show_in_rest' => true,
			'labels' => [
				'name' => 'Inspirations',
				'add_new_item' => 'Add New Inspiration',
				'edit_item' => 'Edit Inspiration',
				'all_items' => 'All Inspirations',
				'singular_name' => 'Inspiration',
			],
			'menu_icon' => 'dashicons-heart',
		]);
	}

	private function registerProjectPostType(): void
	{
		register_post_type('project', [
			'supports' => ['title', 'editor', 'thumbnail'],
			'public' => true,
			'show_in_rest' => true,
			'labels' => [
				'name' => 'Projects',
				'add_new_item' => 'Add New Project',
				'edit_item' => 'Edit Project',
				'all_items' => 'All Projects',
				'singular_name' => 'Projects',
			],
			'menu_icon' => 'dashicons-format-gallery',
		]);
	}
}
