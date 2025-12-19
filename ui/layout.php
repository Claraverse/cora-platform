<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// current view
$current_view = isset($_GET['view']) ? sanitize_key($_GET['view']) : 'dashboard';
?>

<div class="cora-app-shell">

    <!-- Sidebar -->
    <aside class="cora-sidebar" id="coraSidebar">

        <div class="cora-sidebar-header">
            <span class="cora-logo">Cora</span>
            <button class="cora-toggle" id="coraToggle">☰</button>
        </div>

        <nav class="cora-nav">

            <a href="<?php echo admin_url('admin.php?page=cora&view=dashboard'); ?>"
               class="<?php echo ($current_view === 'dashboard') ? 'active' : ''; ?>">
                <span class="icon"><?php echo cora_icon('dashboard'); ?></span>
                <span class="label">Dashboard</span>
            </a>

            <a href="<?php echo admin_url('admin.php?page=cora&view=design'); ?>"
               class="<?php echo ($current_view === 'design') ? 'active' : ''; ?>">
                <span class="icon"><?php echo cora_icon('design'); ?></span>
                <span class="label">Design</span>
            </a>

            <a href="<?php echo admin_url('admin.php?page=cora&view=develop'); ?>"
               class="<?php echo ($current_view === 'develop') ? 'active' : ''; ?>">
                <span class="icon"><?php echo cora_icon('develop'); ?></span>
                <span class="label">Develop</span>
            </a>

            <a href="<?php echo admin_url('admin.php?page=cora&view=marketing'); ?>"
               class="<?php echo ($current_view === 'marketing') ? 'active' : ''; ?>">
                <span class="icon"><?php echo cora_icon('marketing'); ?></span>
                <span class="label">Marketing</span>
            </a>

            <a href="<?php echo admin_url('admin.php?page=cora&view=operations'); ?>"
               class="<?php echo ($current_view === 'operations') ? 'active' : ''; ?>">
                <span class="icon"><?php echo cora_icon('operations'); ?></span>
                <span class="label">Operations</span>
            </a>

            <a href="<?php echo admin_url('admin.php?page=cora&view=ai'); ?>"
               class="<?php echo ($current_view === 'ai') ? 'active' : ''; ?>">
                <span class="icon"><?php echo cora_icon('ai'); ?></span>
                <span class="label">AI</span>
            </a>

            <a href="<?php echo admin_url('admin.php?page=cora&view=seo'); ?>"
               class="<?php echo ($current_view === 'seo') ? 'active' : ''; ?>">
                <span class="icon"><?php echo cora_icon('seo'); ?></span>
                <span class="label">SEO</span>
            </a>

            <a href="<?php echo admin_url('admin.php?page=cora&view=finance'); ?>"
               class="<?php echo ($current_view === 'finance') ? 'active' : ''; ?>">
                <span class="icon"><?php echo cora_icon('finance'); ?></span>
                <span class="label">Finance</span>
            </a>

            <div class="cora-nav-divider"></div>

            <a href="<?php echo admin_url(); ?>">
                <span class="icon"><?php echo cora_icon('wp'); ?></span>
                <span class="label">WordPress Admin</span>
            </a>

        </nav>
    </aside>

    <!-- Main Content -->
    <main class="cora-app-main">
        <?php
        $view_file = CORA_PATH . 'ui/views/' . $current_view . '.php';

        if ( file_exists( $view_file ) ) {
            require $view_file;
        } else {
            require CORA_PATH . 'ui/views/dashboard.php';
        }
        ?>
    </main>

</div>
