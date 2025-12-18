<?php
namespace Cora\Core\Access;

if ( ! defined( 'ABSPATH' ) ) exit;

class Roles {

    public static function register() {

        self::extend_admin();
        self::register_owner();
        self::register_manager();
        self::register_member();
    }

private static function extend_admin() {
    $admin = get_role( 'administrator' );
    if ( ! $admin ) return;

    $caps = array_merge(
        Capabilities::platform(),
        Capabilities::module_caps()
    );

    foreach ( $caps as $cap ) {
        if ( ! $admin->has_cap( $cap ) ) {
            $admin->add_cap( $cap );
        }
    }
}


    private static function register_owner() {
        add_role(
            'cora_owner',
            'Cora Owner',
            self::base_caps([
                'cora_manage_users',
                'cora_manage_modules',
            ])
        );
    }

    private static function register_manager() {
        add_role(
            'cora_manager',
            'Cora Manager',
            self::base_caps([
                'cora_access_design',
                'cora_access_marketing',
                'cora_access_seo',
            ])
        );
    }

    private static function register_member() {
        add_role(
            'cora_member',
            'Cora Member',
            self::base_caps()
        );
    }

    private static function base_caps( array $extra = [] ) {
        $caps = [
            'read' => true,
            'cora_platform_access' => true,
            'cora_view_dashboard'  => true,
        ];

        foreach ( $extra as $cap ) {
            $caps[ $cap ] = true;
        }

        foreach ( Capabilities::module_caps() as $cap ) {
            if ( in_array( $cap, $extra, true ) ) {
                $caps[ $cap ] = true;
            }
        }

        return $caps;
    }
}
