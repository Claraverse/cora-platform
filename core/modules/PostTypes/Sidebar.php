<?php
namespace Cora\Modules\PostTypes;

if (!defined('ABSPATH')) exit;

class Sidebar
{
    public static function register(): void
    {
        add_filter('cora_sidebar_items', function ($items) {

            foreach (Storage::all() as $type) {
                $items[] = [
                    'key'   => 'pt-' . $type['slug'],
                    'label' => $type['label'],
                    'icon'  => 'post',
                    'view'  => 'post-type&slug=' . $type['slug'],
                    'order' => 50,
                    'cap'   => 'edit_posts',
                ];
            }

            return $items;
        });
    }
}
