<?php
use Cora\Core\Modules\Registry;

$modules = Registry::enabled();
?>

<nav class="cora-sidebar">
    <div class="cora-sidebar-top">
        <span class="cora-logo">Cora</span>
        <button class="cora-toggle">☰</button>
    </div>

    <ul class="cora-nav">
        <li class="<?= empty($_GET['view']) ? 'active' : '' ?>">
            <a href="<?= admin_url('admin.php?page=cora') ?>">
                <span>Dashboard</span>
            </a>
        </li>

        <?php foreach ($modules as $slug => $module): ?>
            <li class="<?= ($_GET['view'] ?? '') === $slug ? 'active' : '' ?>">
                <a href="<?= admin_url('admin.php?page=cora&view=' . $slug) ?>">
                    <span><?= esc_html($module['label']) ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="cora-sidebar-footer">
        <a href="<?= admin_url() ?>">WordPress Admin</a>
    </div>
</nav>
