<?php
namespace Cora\Modules\PostTypes;

if (!defined('ABSPATH')) exit;

class Module {

    public static function boot(): void {
        Registrar::register_all();
        Sidebar::register();
    }
}
