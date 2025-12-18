<?php
namespace Cora\Core\Access;

if ( ! defined( 'ABSPATH' ) ) exit;

class Capabilities {

    public static function platform() {
        return [
            'cora_internal_access',
            'cora_platform_access',
            'cora_view_dashboard',
            'cora_manage_users',
            'cora_manage_roles',
            'cora_manage_modules',
        ];
    }

    public static function modules() {
        return [
            'design',
            'develop',
            'marketing',
            'operations',
            'ai',
            'seo',
            'finance',
        ];
    }

    public static function module_caps() {
        return array_map(
            fn($m) => 'cora_access_' . $m,
            self::modules()
        );
    }
}
