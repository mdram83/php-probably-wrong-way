<?php

namespace PhpProbablyWrongWay;

class ThemeSetup
{


    public function __construct()
    {
        add_action('wp_loaded', [$this, 'toggleAdminBar']);
        add_action('wp_enqueue_scripts', [$this, 'loadThemeFiles']);
    }

    public function toggleAdminBar(): void
    {
        if (is_user_logged_in()) {
            show_admin_bar(false);
        }
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
}
