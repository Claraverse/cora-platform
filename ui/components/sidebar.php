<?php
namespace Cora\Core\UI;

if (!defined('ABSPATH')) exit;

namespace Cora\Core\Modules\PostTypes\Registry;

class Sidebar
{
    /**
     * Get all sidebar items dynamically
     */
    public static function items(): array
    {
        $items = [];

        /**
         * --------------------------------------------------
         * Core items (always available)
         * --------------------------------------------------
         */
        $items[] = [
            'key'   => 'dashboard',
            'label' => 'Dashboard',
            'icon'  => 'dashboard',
            'view'  => 'dashboard',
            'order' => 10,
            'cap'   => 'read',
        ];

        /**
         * --------------------------------------------------
         * Media (Cora Media Module)
         * --------------------------------------------------
         */
        if (current_user_can('upload_files')) {
            $items[] = [
                'key'   => 'media',
                'label' => 'Media',
                'icon'  => 'image',
                'view'  => 'media',
                'order' => 20,
                'cap'   => 'upload_files',
            ];
        }

        /**
         * --------------------------------------------------
         * Default Post Types (Posts, Pages, etc.)
         * --------------------------------------------------
         */
        foreach (Registry::getAll() as $slug => $config) {

            if (!current_user_can($config['capability'])) {
                continue;
            }

            $items[] = [
                'key'   => $slug,
                'label' => $config['label'],
                'icon'  => $config['icon'],
                'view'  => 'post-types',
                'args'  => [
                    'type' => $slug,
                ],
                'order' => $config['order'],
                'cap'   => $config['capability'],
            ];
        }

        /**
         * --------------------------------------------------
         * Sort by order (ascending)
         * --------------------------------------------------
         */
        usort($items, function ($a, $b) {
            return ($a['order'] ?? 100) <=> ($b['order'] ?? 100);
        });

        return $items;
    }
}
