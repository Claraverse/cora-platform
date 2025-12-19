<?php
namespace Cora\Core\UI;

if (!defined('ABSPATH'))
    exit;

class Sidebar
{

    /**
     * Returns sidebar items dynamically
     */
    public static function items(): array
    {

        return [

            [
                'key' => 'dashboard',
                'label' => 'Dashboard',
                'icon' => 'dashboard',
                'view' => 'dashboard',
                'order' => 10,
                'cap' => 'read',
            ],


            /*
             | Future items go here when they actually exist
             |
             | Example:
             | [
             |   'key'   => 'post-types',
             |   'label' => 'Post Types',
             |   'icon'  => 'post',
             |   'view'  => 'post-types',
             | ]
             */
        ];
    }
}
