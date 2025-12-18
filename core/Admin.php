<?php
namespace Cora\Core;

use Cora\Core\Access\Guards;

if ( ! defined( 'ABSPATH' ) ) exit;

class Admin {

    /**
     * Register admin hooks
     */
    public static function init() {
        add_action( 'admin_menu', [ self::class, 'register_menu' ] );
    }

    /**
     * Register Cora top-level menu
     */
    public static function register_menu() {

        // Only users who can access Cora should see the menu
        if ( ! Guards::can_access_platform() ) {
            return;
        }

        add_menu_page(
            'Cora Platform',
            'Cora',
            'read',                     // capability checked manually via Guards
            'cora',
            [ self::class, 'render_app' ],
            'dashicons-grid-view',
            2
        );
    }

    /**
     * Render the Cora application shell
     */
    public static function render_app() {

        if ( ! Guards::can_access_platform() ) {
            wp_die( __( 'You do not have permission to access Cora.', 'cora' ) );
        }

        require CORA_PATH . 'ui/layout.php';
    }
}
