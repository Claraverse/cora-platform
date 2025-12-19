<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$title = 'Operations';
$description = 'System settings, modules, and platform configuration.';
$actions = [
    [
        'label' => 'Configure Modules',
        'url'   => admin_url('admin.php?page=cora&view=operations'),
    ],
];

require CORA_PATH . 'ui/components/header.php';
?>

<div class="cora-card">
    <p class="muted">
        This workspace will manage operations, configurations, and internal tools.
    </p>
</div>
