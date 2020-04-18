<?php

global $topCategory;

// Top Category

if ($topCategory) {
	
	$categories = get_categories( array(
		'term_taxonomy_id' => $topCategory
	) );

	foreach( $categories as $category ) { ?>
	
		<article id="category-<?php echo $category->term_id; ?>" class="category-box current-category">
			<div class="entry-content">
			  <? echo "xx".get_the_category()."xx";?>
				<!-- linking whole entry to single post -->
				<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
				   alt="<?php echo esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ); ?>"
				   class="teaser-body-link">
					<h1 class="teaser-title"><?php echo $category->name; ?></h1>
					<p><?php echo $category->description; ?></p>
				</a>
			</div><!-- .entry-content -->
		</article><!-- #category-## -->

	<?php }

}

// Other Categories

$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
	'exclude' => $topCategory
) );

foreach( $categories as $category ) { ?>
	
    <article id="category-<?php echo $category->term_id; ?>" class="category-box">
        <div class="entry-content">
          <? echo "xx".get_the_category()."xx";?>
            <!-- linking whole entry to single post -->
            <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
               alt="<?php echo esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ); ?>"
               class="teaser-body-link">
                <h1 class="teaser-title"><?php echo $category->name; ?></h1>
                <p><?php echo $category->description; ?></p>
            </a>
        </div><!-- .entry-content -->
    </article><!-- #category-## -->

<?php } ?>
