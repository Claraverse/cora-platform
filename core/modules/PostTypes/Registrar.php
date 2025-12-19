<?php
namespace Cora\Modules\PostTypes;

if (!defined('ABSPATH')) exit;

class Registrar {

    public static function register_all(): void {
        $types = Storage::all();

        foreach ($types as $type) {
            register_post_type($type['slug'], [
                'label'       => $type['label'],
                'public'      => true,
                'show_in_menu'=> false,
                'show_in_rest'=> true,
                'supports'    => ['title', 'editor'],
            ]);
        }
    }
}
