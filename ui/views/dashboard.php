<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$title = 'Cora Dashboard';
$description = 'Manage your business operations from one unified platform.';
$actions = [
    [
        'label' => 'Configure Modules',
        'url'   => admin_url('admin.php?page=cora&view=operations'),
    ],
];

require CORA_PATH . 'ui/components/header.php';
?>
<?php
use Cora\Core\Modules\Registry;
$modules = Registry::enabled();
?>


<div class="cora-dashboard">

    <section class="cora-card">
        <h2>Platform Status</h2>
        <ul class="cora-status-list">
            <li><span>System</span><strong>Operational</strong></li>
            <li><span>User Access</span><strong>Configured</strong></li>
            <li><span>Modules</span><strong>Ready</strong></li>
        </ul>
    </section>

  <div class="cora-card">
    <h3>Enabled Modules</h3>
    <div class="cora-module-tags">
        <?php foreach ($modules as $module): ?>
            <span class="cora-tag">
                <?= esc_html($module['label']) ?>
            </span>
        <?php endforeach; ?>
    </div>
</div>
    <!-- Quick Actions -->
    <section class="cora-card">
        <h2>Quick Actions</h2>
    
        <div class="cora-actions">
            <button class="cora-action">Open Design Workspace</button>
            <button class="cora-action">Manage Users</button>
            <button class="cora-action">Configure Modules</button>
        </div>
    </section>

</div>

