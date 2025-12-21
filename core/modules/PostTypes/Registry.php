<?php
namespace Cora\Core\Modules\PostTypes\Registry;

if (!defined('ABSPATH')) exit;

class Registry
{
    /**
     * Get all post types exposed to Cora
     */
    public static function getAll(): array
    {
        return [
            'post' => [
                'label' => 'Posts',
                'capability' => 'edit_posts',
                'icon' => 'post',
                'order' => 20,
            ],
            'page' => [
                'label' => 'Pages',
                'capability' => 'edit_pages',
                'icon' => 'page',
                'order' => 30,
            ],
        ];
    }
}
