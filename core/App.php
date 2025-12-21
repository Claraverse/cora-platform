<?php
namespace Cora\Core;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Main Application Bootstrap
 */
class App {

    /**
     * Initialize the Cora Platform
     */
    public static function init() {

        /**
         * --------------------------------------------------
         * 1. Load CORE dependencies (order matters)
         * --------------------------------------------------
         */

        // Admin shell
        require_once CORA_PATH . 'core/Admin.php';

        // Assets loader
        require_once CORA_PATH . 'core/Assets.php';

        /**
         * --------------------------------------------------
         * 2. Load Media Module (explicit, no autoload magic)
         * --------------------------------------------------
         */

        require_once CORA_PATH . 'core/Modules/Media/Query.php';
        require_once CORA_PATH . 'core/Modules/Media/Controller.php';
        require_once CORA_PATH . 'core/Modules/Media/Actions.php';
        require_once CORA_PATH . 'core/Modules/Media/Permissions.php';

        /**
         * --------------------------------------------------
         * 3. Initialize Admin & Assets
         * --------------------------------------------------
         */

        Admin::init();
        Assets::init();

        /**
         * --------------------------------------------------
         * 4. Initialize Media Module
         * --------------------------------------------------
         */

        if ( class_exists( '\Cora\Core\Modules\Media\Controller' ) ) {
            \Cora\Core\Modules\Media\Controller::init();
        }

        /**
         * --------------------------------------------------
         * 5. Optional: Admin blocking (safe check)
         * --------------------------------------------------
         */

        if ( class_exists( '\Cora\Core\Access\AdminBlocker' ) ) {
            \Cora\Core\Access\AdminBlocker::init();
        }
    }
}
