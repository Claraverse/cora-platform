<?php
namespace Cora\Core\Modules;

if (!defined('ABSPATH')) exit;

class Storage {

    const OPTION_KEY = 'cora_active_modules';

    public static function get(): array {
        return get_option(self::OPTION_KEY, []);
    }

    public static function is_active(string $key): bool {
        return in_array($key, self::get(), true);
    }

    public static function activate(string $key): void {
        $modules = self::get();
        if (!in_array($key, $modules, true)) {
            $modules[] = $key;
            update_option(self::OPTION_KEY, $modules);
        }
    }

    public static function deactivate(string $key): void {
        $modules = array_diff(self::get(), [$key]);
        update_option(self::OPTION_KEY, $modules);
    }
}
