<?php
namespace Cora\core\Modules;

if (!defined('ABSPATH')) exit;

class Manager {

    public static function boot(): void {
        foreach (Registry::all() as $key => $module) {

            if (!Storage::is_active($key)) {
                continue;
            }

            if (!class_exists($module['class'])) {
                continue;
            }

            $module['class']::boot();
        }
    }
}
