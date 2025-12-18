<?php
namespace Cora\Core\Access;

if ( ! defined( 'ABSPATH' ) ) exit;

class Guards {

    /**
     * Internal users (you + tech team)
     */
    public static function is_internal() : bool {
        return current_user_can( 'cora_internal_access' );
    }

    /**
     * Any user allowed to use Cora Platform
     */
    public static function can_access_platform() : bool {
        return current_user_can( 'cora_platform_access' );
    }

    /**
     * Check module access dynamically
     * Example: Guards::can_access_module('seo')
     */
    public static function can_access_module( string $module ) : bool {
        return current_user_can( 'cora_access_' . sanitize_key( $module ) );
    }

    /**
     * Is WordPress admin allowed?
     * (Only internal users)
     */
    public static function can_access_wp_admin() : bool {
        return self::is_internal();
    }
}
