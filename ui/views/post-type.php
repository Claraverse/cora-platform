<?php
use Cora\Core\Modules\PostTypes\Query;

$type = $_GET['type'] ?? 'post';
$items = Query::all($type);
?>

<div class="cora-header">
    <h1><?= ucfirst($type) ?></h1>
    <button class="cora-header-btn">Add New</button>
</div>

<div class="cora-table">
    <?php foreach ($items as $item): ?>
        <div class="cora-row">
            <span><?= esc_html($item->post_title) ?></span>
            <span><?= esc_html($item->post_status) ?></span>
        </div>
    <?php endforeach; ?>
</div>
