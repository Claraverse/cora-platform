<?php
namespace Cora\Core\Modules\Media;

if (!defined('ABSPATH')) exit;

class Actions {

    public static function register() {
        add_action('wp_ajax_cora_media_upload', [self::class, 'upload']);
    }

    public static function upload() {

        check_ajax_referer('cora_media_upload');

        if (!current_user_can('upload_files')) {
            wp_send_json_error('Permission denied');
        }

        if (empty($_FILES['files'])) {
            wp_send_json_error('No files');
        }

        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        $ids = [];

        foreach ($_FILES['files']['name'] as $i => $name) {

            $file = [
                'name'     => $_FILES['files']['name'][$i],
                'type'     => $_FILES['files']['type'][$i],
                'tmp_name' => $_FILES['files']['tmp_name'][$i],
                'error'    => $_FILES['files']['error'][$i],
                'size'     => $_FILES['files']['size'][$i],
            ];

            $_FILES = ['upload' => $file];

            $id = media_handle_upload('upload', 0);

            if (!is_wp_error($id)) {
                $ids[] = $id;
            }
        }

        wp_send_json_success([
            'uploaded' => $ids
        ]);
    }
}
