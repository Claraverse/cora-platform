<?php
/**
 * Plugin Name: Cora Platform
 * Description: Cora Business Platform – modular admin system.
 * Version: 0.1.0
 * Author: Claraverse
 */

if ( ! defined('ABSPATH') ) exit;

add_action('admin_menu', function () {
    add_menu_page(
        'Cora',
        'Cora',
        'manage_options',
        'cora',
        function () {
            echo '<h1>Cora Platform Loaded</h1>';
        },
        'dashicons-grid-view',
        2
    );
});
