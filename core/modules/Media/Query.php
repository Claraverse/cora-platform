<?php
namespace Cora\Core\Modules\Media;

if (!defined('ABSPATH')) {
    exit;
}

class Query
{
    public static function all(): array
    {
        $query = new \WP_Query([
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ]);

        $items = [];

        foreach ($query->posts as $post) {
            $thumb = wp_get_attachment_image_url($post->ID, 'medium');

            $items[] = [
                'id'    => $post->ID,
                'title' => $post->post_title ?: 'Untitled',
                'thumb' => $thumb ?: '',
                'url'   => wp_get_attachment_url($post->ID),
                'type'  => $post->post_mime_type,
            ];
        }

        return $items;
    }
}
