<?php
if (!defined('ABSPATH')) exit;

/**
 * --------------------------------------------------
 * Load UI Components (no autoloader yet)
 * --------------------------------------------------
 */
require_once CORA_PATH . 'ui/components/Sidebar.php';

use Cora\Core\UI\Components\Sidebar;

/**
 * --------------------------------------------------
 * Resolve current view
 * --------------------------------------------------
 */
$current_view = isset($_GET['view']) ? sanitize_key($_GET['view']) : 'dashboard';

/**
 * --------------------------------------------------
 * Sidebar items (single source of truth)
 * --------------------------------------------------
 */
$sidebar_items = Sidebar::items();
?>

<div class="cora-app-shell">

    <!-- Sidebar -->
    <aside class="cora-sidebar" id="coraSidebar">

        <div class="cora-sidebar-header">
            <span class="cora-logo">Cora</span>
            <button class="cora-toggle" id="coraToggle" aria-label="Toggle sidebar">
                ☰
            </button>
        </div>

        <nav class="cora-nav">

            <?php foreach ($sidebar_items as $item): ?>

                <?php
                // Build URL safely (supports args like post-types&type=post)
                $url = admin_url('admin.php?page=cora&view=' . $item['view']);

                if (!empty($item['args']) && is_array($item['args'])) {
                    $url .= '&' . http_build_query($item['args']);
                }

                $is_active = ($current_view === $item['view']);
                ?>

                <a href="<?php echo esc_url($url); ?>"
                   class="<?php echo $is_active ? 'active' : ''; ?>">
                    <span class="icon">
                        <?php echo cora_icon($item['icon']); ?>
                    </span>
                    <span class="label">
                        <?php echo esc_html($item['label']); ?>
                    </span>
                </a>

            <?php endforeach; ?>

            <div class="cora-nav-divider"></div>

            <!-- Utility (always last) -->
            <a href="<?php echo esc_url(admin_url()); ?>" class="cora-nav-item-muted">
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
