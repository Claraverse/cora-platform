<?php
if (!defined('ABSPATH')) exit;

use Cora\Core\UI\Sidebar;

// current view
$current_view = isset($_GET['view']) ? sanitize_key($_GET['view']) : 'dashboard';

// sidebar items (single source of truth)
$sidebar_items = Sidebar::items();
?>

<div class="cora-app-shell">

    <!-- Sidebar -->
    <aside class="cora-sidebar" id="coraSidebar">

        <div class="cora-sidebar-header">
            <span class="cora-logo">Cora</span>
            <button class="cora-toggle" id="coraToggle">☰</button>
        </div>

        <nav class="cora-nav">

            <?php foreach ($sidebar_items as $item): ?>
                <a href="<?php echo admin_url('admin.php?page=cora&view=' . $item['view']); ?>"
                   class="<?php echo ($current_view === $item['view']) ? 'active' : ''; ?>">
                    <span class="icon"><?php echo cora_icon($item['icon']); ?></span>
                    <span class="label"><?php echo esc_html($item['label']); ?></span>
                </a>
            <?php endforeach; ?>

            <div class="cora-nav-divider"></div>

            <!-- Utility (always last) -->
            <a href="<?php echo admin_url(); ?>" class="cora-nav-item-muted">
                <span class="icon"><?php echo cora_icon('wp'); ?></span>
                <span class="label">WordPress Admin</span>
            </a>

        </nav>

    </aside>

    <!-- Main Content -->
    <main class="cora-app-main">
        <?php
        $view_file = CORA_PATH . 'ui/views/' . $current_view . '.php';

        if (file_exists($view_file)) {
            require $view_file;
        } else {
            require CORA_PATH . 'ui/views/dashboard.php';
        }
        ?>
    </main>

</div>
