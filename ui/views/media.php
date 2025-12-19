<?php
if (!defined('ABSPATH'))
    exit;

use Cora\Modules\Media\Query;

// Load media safely
$items = [];

try {
    $items = Query::all();
} catch (\Throwable $e) {
    $items = [];
}
?>

<div class="cora-header">
    <div class="cora-header-left">
        <h1>Media Library</h1>
        <p class="cora-header-desc">Manage your assets in one place.</p>
    </div>

    <div class="cora-header-actions">
        <input type="search" placeholder="Search media..." class="cora-input">
        <button class="cora-header-btn">Upload</button>
    </div>
</div>

<div class="cora-media-grid">

    <?php if (empty($items)): ?>
        <div class="cora-empty">
            <p>No media found.</p>
        </div>
    <?php endif; ?>

    <?php foreach ($items as $item): ?>

        <?php
        $id = $item['id'] ?? 0;
        $title = $item['title'] ?? 'Untitled';
        $thumb = $item['thumb'] ?? '';
        $type = $item['type'] ?? 'file';
        ?>

        <!-- <div class="cora-media-card" data-id="<?php echo esc_attr($id); ?>"> -->
        <div class="cora-media-card" data-id="<?php echo esc_attr($id); ?>" data-title="<?php echo esc_attr($title); ?>"
            data-type="<?php echo esc_attr($type); ?>" data-url="<?php echo esc_url($item['url']); ?>"
            data-thumb="<?php echo esc_url($thumb); ?>">

            <div class="cora-media-thumb">

                <?php if ($thumb): ?>
                    <img src="<?php echo esc_url($thumb); ?>" alt="">
                <?php else: ?>
                    <div class="cora-media-placeholder">
                        <?php echo esc_html(strtoupper($type)); ?>
                    </div>
                <?php endif; ?>

            </div>

            <div class="cora-media-meta">
                <span class="cora-media-name">
                    <?php echo esc_html($title); ?>
                </span>
            </div>

        </div>

    <?php endforeach; ?>

</div>
