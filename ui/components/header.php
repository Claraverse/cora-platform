<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Cora Header Component
 *
 * Expected variables:
 * $title (string)
 * $description (string|null)
 * $actions (array|null)
 */
?>

<div class="cora-header">

    <div class="cora-header-left">
        <h1><?php echo esc_html( $title ); ?></h1>

        <?php if ( ! empty( $description ) ) : ?>
            <p class="cora-header-desc">
                <?php echo esc_html( $description ); ?>
            </p>
        <?php endif; ?>
    </div>

    <?php if ( ! empty( $actions ) && is_array( $actions ) ) : ?>
        <div class="cora-header-actions">
            <?php foreach ( $actions as $action ) : ?>
                <a href="<?php echo esc_url( $action['url'] ); ?>"
                   class="cora-header-btn">
                    <?php echo esc_html( $action['label'] ); ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>
