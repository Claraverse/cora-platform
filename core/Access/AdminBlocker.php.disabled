<?php
namespace Cora\Core\Access;

if ( ! defined( 'ABSPATH' ) ) exit;

class AdminBlocker {

    public static function init() {
        add_action( 'admin_init', [ self::class, 'block_wp_admin' ], 1 );
        add_filter( 'show_admin_bar', [ self::class, 'hide_admin_bar' ] );
    }

    /**
     * Block wp-admin for non-internal users
     */
   public static function block_wp_admin() {

    // Allow unauthenticated users to login
    if ( ! is_user_logged_in() ) {
        return;
    }

    // Allow AJAX, REST, CRON, CLI
    if ( wp_doing_ajax() || wp_doing_cron() || defined( 'WP_CLI' ) ) {
        return;
    }

    // Internal users are allowed
    if ( Guards::can_access_wp_admin() ) {
        return;
    }

    // Allow login & logout actions
    $request_uri = $_SERVER['REQUEST_URI'] ?? '';
    if (
        strpos( $request_uri, 'wp-login.php' ) !== false ||
        strpos( $request_uri, 'action=logout' ) !== false
    ) {
        return;
    }

    // Redirect Cora users to Cora dashboard
    if ( Guards::can_access_platform() ) {
        wp_safe_redirect( admin_url( 'admin.php?page=cora' ) );
        exit;
    }

    // Final fallback
    wp_safe_redirect( wp_login_url() );
    exit;
}


    /**
     * Hide admin bar for non-internal users
     */
    public static function hide_admin_bar( $show ) {
        if ( Guards::is_internal() ) {
            return $show;
        }
        return false;
    }
}
