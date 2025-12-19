<?php
namespace Cora\Core\Modules;

if (!defined('ABSPATH')) exit;

class Registry
{
    public static function all(): array
    {
        return [
            'design' => [
                'label' => 'Design',
                'icon'  => 'palette',
                'enabled' => true,
            ],
            'develop' => [
                'label' => 'Develop',
                'icon'  => 'code',
                'enabled' => true,
            ],
            'marketing' => [
                'label' => 'Marketing',
                'icon'  => 'megaphone',
                'enabled' => true,
            ],
            'operations' => [
                'label' => 'Operations',
                'icon'  => 'settings',
                'enabled' => true,
            ],
            'ai' => [
                'label' => 'AI',
                'icon'  => 'sparkles',
                'enabled' => false,
            ],
            'seo' => [
                'label' => 'SEO',
                'icon'  => 'search',
                'enabled' => true,
            ],
            'finance' => [
                'label' => 'Finance',
                'icon'  => 'credit-card',
                'enabled' => false,
            ],
        ];
    }

    public static function enabled(): array
    {
        return array_filter(self::all(), fn($m) => $m['enabled']);
    }
}
