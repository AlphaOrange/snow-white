<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package snowwhite
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php // You can start editing here -- including this comment!  ?>

    <input type="checkbox" id="checkbox-show-comments" class="checkbox-show-comments" />
    <label for="checkbox-show-comments" class="content-show-comments snowwhite-button"><?php comments_number(__('Comment on this', 'snowwhite'), __('Show 1 Comment', 'snowwhite'), __('Show % Comments', 'snowwhite')); ?></label>

    <div id="comments-inner" class="comments-inner-area">

        <?php if (have_comments()) : ?>

            <h2 class="comments-title">
                <?php
				if (get_comments_number() == 1) {
					printf(__('One thought on &ldquo;%1$s&rdquo;', 'snowwhite'), '<span>' . get_the_title() . '</span>');
				} else {
					printf(__('%1$s thoughts on &ldquo;%2$s&rdquo;', 'snowwhite'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>');
				}
                ?>
            </h2>

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through  ?>
                <nav id="comment-nav-above" class="comment-navigation" role="navigation">
                    <h1 class="screen-reader-text"><?php _e('Comment navigation', 'snowwhite'); ?></h1>
                    <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'snowwhite')); ?></div>
                    <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'snowwhite')); ?></div>
                </nav><!-- #comment-nav-above -->
            <?php endif; // check for comment navigation  ?>

            <ol class="comment-list">
                <?php
                wp_list_comments(array(
                    'style' => 'ol',
                    'short_ping' => true,
                ));
                ?>
            </ol><!-- .comment-list -->

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through  ?>
                <nav id="comment-nav-below" class="comment-navigation" role="navigation">
                    <h1 class="screen-reader-text"><?php _e('Comment navigation', 'snowwhite'); ?></h1>
                    <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'snowwhite')); ?></div>
                    <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'snowwhite')); ?></div>
                </nav><!-- #comment-nav-below -->
            <?php endif; // check for comment navigation  ?>

        <?php endif; // have_comments() ?>

        <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
            ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'snowwhite'); ?></p>
        <?php endif; ?>

        <?php comment_form(array('comment_notes_after' => '<p class="form-allowed-tags">' . sprintf(__('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'snowwhite'), '<br><code>' . allowed_tags() . '</code>') . '</p>')); ?>

    </div><!-- #comments-inner -->

</div><!-- #comments -->