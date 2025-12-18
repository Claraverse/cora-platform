<?php
namespace Cora\Core;

use Cora\Core\Access\AdminBlocker;

if ( ! defined( 'ABSPATH' ) ) exit;

class App {

    /**
     * Initialize the Cora Platform
     */
    public static function init() {

        // Register admin entry
        Admin::init();

        // Load admin assets
        Assets::init();

        // Enforce access control (block WP admin for non-internal users)
        if ( class_exists( AdminBlocker::class ) ) {
            AdminBlocker::init();
        }
    }
}
