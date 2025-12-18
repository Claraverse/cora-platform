<?php
/**
 * Plugin Name: Cora Platform
 * Description: Cora Business Platform – modular admin operating system.
 * Version: 0.1.0
 * Author: Claraverse
 * Text Domain: cora-platform
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
|--------------------------------------------------------------------------
| Constants
|--------------------------------------------------------------------------
*/

define( 'CORA_PATH', plugin_dir_path( __FILE__ ) );
define( 'CORA_URL', plugin_dir_url( __FILE__ ) );
define( 'CORA_VERSION', '0.1.0' );

/*
|--------------------------------------------------------------------------
| Core Includes
|--------------------------------------------------------------------------
| Keep this file thin. All logic lives in core/*.
*/

require_once CORA_PATH . 'core/App.php';
require_once CORA_PATH . 'core/Admin.php';
require_once CORA_PATH . 'core/Assets.php';

/*
|--------------------------------------------------------------------------
| Access Control (Roles & Capabilities)
|--------------------------------------------------------------------------
*/

require_once CORA_PATH . 'core/Access/Capabilities.php';
require_once CORA_PATH . 'core/Access/Roles.php';
require_once CORA_PATH . 'core/Access/Guards.php';
// require_once CORA_PATH . 'core/Access/AdminBlocker.php';
/*
|--------------------------------------------------------------------------
| Plugin Boot
|--------------------------------------------------------------------------
*/

add_action( 'plugins_loaded', function () {
    \Cora\Core\App::init();
});

/*
|--------------------------------------------------------------------------
| Activation Hook
|--------------------------------------------------------------------------
| Roles & capabilities are created automatically.
*/

register_activation_hook( __FILE__, function () {
    \Cora\Core\Access\Roles::register();
});
