<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$title = 'Design Workspace';
$description = 'Branding, UI/UX systems, and visual asset management.';
$actions = [
    [
        'label' => 'Create New Asset',
        'url'   => '#',
    ],
];

require CORA_PATH . 'ui/components/header.php';
?>

<div class="cora-card">
    <p class="muted">
        This workspace will manage all design-related tools and assets.
    </p>
</div>
