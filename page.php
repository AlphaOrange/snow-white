<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package snowwhite
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <!-- top article -->
        <div id="article-view" class="content-article">
		
            <?php
            $postsBU = $posts;      // creating Backup for original loop
            $posts = query_posts($query_string . '&paged=1&posts_per_page=1'); // paged=1: latest page, ppp=1: 1 post per page => most recent post

            if (have_posts()) :

                while (have_posts()) : the_post();

                    $first_post_ID = get_the_ID();
                    get_template_part('content-page');

                endwhile;
            endif;
            ?>
        </div><!-- #article-view -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php //get_sidebar();      ?>
<?php get_footer(); ?>
