<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package snowwhite
 */
?>

<section class="no-results not-found">
    <div class="page-content">
        <?php if (is_search()) : ?>

            <p><?php _e('This is the only article matching your search terms.', 'snowwhite'); ?></p>

        <?php else : ?>

            <p><?php _e('This is the only article matching your request.', 'snowwhite'); ?></p>

        <?php endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
