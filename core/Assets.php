<?php
namespace Cora\Core;

if ( ! defined( 'ABSPATH' ) ) exit;

class Assets {

    /**
     * Hook asset loading
     */
    public static function init() {
        add_action( 'admin_enqueue_scripts', [ self::class, 'enqueue_admin_assets' ] );
    }

    /**
     * Enqueue assets only on Cora page
     */
    public static function enqueue_admin_assets( $hook ) {

        // Only load on Cora admin page
        if ( $hook !== 'toplevel_page_cora' ) {
            return;
        }

        wp_enqueue_style(
            'cora-admin',
            CORA_URL . 'assets/css/cora-admin.css',
            [],
            '0.1.0'
        );

        wp_enqueue_script(
            'cora-admin',
            CORA_URL . 'assets/js/cora-admin.js',
            [],
            '0.1.0',
            true
        );
    }
}
