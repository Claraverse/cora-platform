<?php
use Cora\core\Modules\Media\Query;

if (!defined('ABSPATH'))
    exit;

$media_items = Query::all();
?>

<div class="cora-header">
    <div class="cora-header-left">
        <h1>Media Library</h1>
        <p class="cora-header-desc">Manage your assets in one place.</p>
    </div>

    <div class="cora-header-actions">
        <input type="text" class="cora-input" placeholder="Search media..." />

        <!-- IMPORTANT ID -->
        <button class="cora-header-btn" id="coraMediaUpload">
            Upload
        </button>
    </div>
</div>


<?php if (empty($media_items)): ?>
    <p class="muted">No media found.</p>
<?php else: ?>

    <div class="cora-media-grid">
        <?php foreach ($media_items as $item): ?>
            <div class="cora-media-card" data-id="<?php echo esc_attr($item['id']); ?>"
                data-url="<?php echo esc_url($item['url']); ?>" data-title="<?php echo esc_attr($item['title']); ?>"
                data-type="<?php echo esc_attr($item['type']); ?>">
                <div class="cora-media-thumb">
                    <?php if ($item['thumb']): ?>
                        <img src="<?php echo esc_url($item['thumb']); ?>" alt="">
                    <?php else: ?>
                        <span class="cora-media-placeholder">No Preview</span>
                    <?php endif; ?>
                </div>

                <div class="cora-media-meta">
                    <div class="cora-media-name">
                        <?php echo esc_html($item['title']); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>