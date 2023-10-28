<?php

namespace PhpProbablyWrongWay;

class ThemeSetup
{
    public function __construct()
    {
        add_action('wp_loaded', [$this, 'displayAdminBar']);
    }

    public function displayAdminBar(): void
    {
        if (is_user_logged_in()) {
            show_admin_bar(true);
        }
    }
}
