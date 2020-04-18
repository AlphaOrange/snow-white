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
                    get_template_part('content', get_post_format());

                    // If comments are open or we have at least one comment, load up the comment template
                    if (comments_open() || '0' != get_comments_number()) :
                        $withcomments = 1;
                        comments_template();
                    endif;
                endwhile;
            endif;
            ?>
        </div><!-- #article-view -->

        <!-- article roll left sidebar -->
        <div id="article-list" class="content-roll">

            <?php
            $posts = $postsBU;
            wp_reset_query();

            if (have_posts()) :

                /* Start the Loop */
                while (have_posts()) : the_post();
                    if (get_the_ID() != $first_post_ID) {
                        get_template_part('teaser', get_post_format());
                        $have_roll_post = true;
                    } else {
                        $have_featured_post = true;
                    }
                endwhile;

                snowwhite_paging_nav();

            endif;

            if (!$have_roll_post && !$have_featured_post) {

                get_template_part('content', 'none');

            } else if (!$have_roll_post && $have_featured_post) {

                get_template_part('content', 'none-more');

            }
            ?>

        </div><!-- #article-list -->

        <!-- category roll right sidebar -->
        <div id="category-list" class="content-roll">
          <?php
			$topCategory = get_the_category()[0]->cat_ID;
			get_template_part('rollCategory', get_post_format());
	      ?>
        </div><!-- #article-list -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php //get_sidebar();      ?>
<?php get_footer(); ?>
