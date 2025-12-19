<?php
namespace Cora\Modules\Media;

if (!defined('ABSPATH')) exit;

class Module {

    public static function boot(): void {
        // Sidebar entry
        add_filter('cora_sidebar_items', [self::class, 'sidebar_item']);
    }

    public static function sidebar_item(array $items): array {
        $items[] = [
            'key'   => 'media',
            'label' => 'Media',
            'icon'  => 'image',
            'view'  => 'media',
            'order' => 20,
            'cap'   => 'upload_files',
        ];

        return $items;
    }
}
