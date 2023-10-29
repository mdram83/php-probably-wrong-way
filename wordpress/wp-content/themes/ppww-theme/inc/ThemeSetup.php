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
}
