<?php

/*
 * Plugin Name:       php probably wrong way - chatgpt editor
 * Plugin URI:        https://github.com/mdram83/php-probably-wrong-way
 * Description:       Chat with ChatGPT when creating a content of your page in Editor.
 * Version:           1.0
 * Requires at least: 6.3.2
 * Requires PHP:      8.2
 * Author:            mdram83
 * Author URI:        https://github.com/mdram83/
 * Text Domain:       ppww
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) exit();

require plugin_dir_path(__FILE__) . 'inc/PluginSetup.php';

new \PhpProbablyWrongWay\PluginSetup(plugin_dir_url(__FILE__));
