<?php
/**
 * @package snowwhite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">

        <header class="entry-header">
            <?php snowwhite_entry_header(); ?>
        </header><!-- .entry-header -->

        <h1 class="entry-title"><?php the_title(); ?></h1>

        <?php
        // teaser thumbnail 600x200
        the_post_thumbnail('post-title', array('class' => 'alignleft'));
        // show user-defined excerpt or read-more-defined teaser or else first 55 words
        the_content();

        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'snowwhite'),
            'after' => '</div>',
        ));
        ?>
        
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php snowwhite_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
