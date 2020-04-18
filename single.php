<?php
/**
 * The template for displaying all single posts.
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
            if (have_posts()) :

                /* Start the Loop */
                while (have_posts()) : the_post();

                    get_template_part('content', get_post_format());

                    // snowwhite_post_nav(); NOT NECESSARY: there's a post roll on the sidebar
                    // If comments are open or we have at least one comment, load up the comment template
                    if (comments_open() || '0' != get_comments_number()) :
                        comments_template();
                    endif;

                    $postID = get_the_ID();

                endwhile;

            else :

                get_template_part('content', 'none');

            endif;
            ?>
        </div><!-- #article-view -->

        <!-- article roll left sidebar -->
        <div id="article-list" class="content-roll">

          <?php
          $current_post = $post; // remember the current post

          $post = get_next_post(true); // this uses $post->ID
          if ($post) {
			echo '<div class="header-term-adjacent">' . __('Next Episode', 'snowwhite') . '</div>';
            setup_postdata($post);
            get_template_part('teaser', get_post_format());
          }
          $post = $current_post; // restore

          $post = get_previous_post(true); // this uses $post->ID
		  if ($post) {
			echo '<div class="header-term-adjacent">' . __('Previous Episode', 'snowwhite') . '</div>';
			setup_postdata($post);
			get_template_part('teaser', get_post_format());
		  }
          $post = $current_post; // restore
          ?>

          <div class="back-to-top snowwhite-button" rel="top"><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('To index page with all entrys', 'snowwhite'); ?></a></div>

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

<?php //get_sidebar();    ?>
<?php get_footer(); ?>
