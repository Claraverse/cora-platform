<?php
namespace Cora\Modules\PostTypes;

if (!defined('ABSPATH')) exit;

class Storage {

    const OPTION = 'cora_post_types';

    public static function all(): array {
        return get_option(self::OPTION, []);
    }

    public static function add(array $type): void {
        $types = self::all();
        $types[] = $type;
        update_option(self::OPTION, $types);
    }
}
