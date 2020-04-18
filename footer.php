<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package snowwhite
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <!--<a href="<?php echo esc_url(__('http://wordpress.org/', 'snowwhite')); ?>"><?php printf(__('A %s blog', 'snowwhite'), 'WordPress'); ?></a>
        <span class="sep"> | </span>-->
        <?php _e('by', 'snowwhite'); ?> <img src="<?php bloginfo('template_url'); ?>/pix/alphaorange.png" alt="AlphaOrange"/>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
