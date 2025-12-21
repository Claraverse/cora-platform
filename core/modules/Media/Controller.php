<?php
namespace Cora\Core\Modules\Media;

if (!defined('ABSPATH')) exit;

class Controller {

    public static function init() {
        Actions::register();
    }
}
