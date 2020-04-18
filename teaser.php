<?php
/**
 * @package snowwhite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <header class="entry-header">
            <?php snowwhite_teaser_header(); ?>
        </header><!-- .entry-header -->
        <!-- linking whole entry to single post -->
        <a href="<?php echo esc_url(get_permalink()); ?>" class="teaser-body-link">
            <h1 class="teaser-title"><?php the_title(); ?></h1>
            <?php
            // teaser thumbnail 300x100
            the_post_thumbnail('post-thumbnail', array('class' => 'alignleft'));
            // show user-defined excerpt or read-more-defined teaser or else first 55 words
            the_excerpt('...read more');
            ?>
        </a>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php snowwhite_teaser_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
