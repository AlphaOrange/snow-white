<?php load_theme_textdomain('snowwhite', 'snowwhite/languages'); 

/**
 * snowwhite functions and definitions
 *
 * @package snowwhite
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
    $content_width = 640; /* pixels */
}

if (!function_exists('snowwhite_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function snowwhite_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on snowwhite, use a find and replace
         * to change 'snowwhite' to the name of your theme in all the template files
         */
        load_theme_textdomain('snowwhite', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(300, 100, true);
        add_image_size( 'post-title', 640, 200, true );
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'snowwhite'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link',
        ));

        // Setup the WordPress core custom background feature.
        /* add_theme_support( 'custom-background', apply_filters( 'snowwhite_custom_background_args', array(
          'default-color' => 'ffffff',
          'default-image' => '',
          ) ) ); */
    }

endif; // snowwhite_setup
add_action('after_setup_theme', 'snowwhite_setup');

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function snowwhite_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'snowwhite'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
}

add_action('widgets_init', 'snowwhite_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function snowwhite_scripts() {
    wp_enqueue_style('snowwhite-style', get_stylesheet_uri());

    wp_enqueue_script('snowwhite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    wp_enqueue_script('snowwhite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'snowwhite_scripts');

/**
 * Add custom taxonomy 'serien'
 *
 */
function add_custom_taxonomies() {
    register_taxonomy('series', 'post', array(
        // Tag-like taxonomy
        'hierarchical' => false,
        'labels' => array(
            'name' => __('Series'),
            'singular_name' => __('Series'),
            'search_items' => __('Search series'),
            'all_items' => __('All series'),
            'edit_item' => __('Edit series'),
            'update_item' => __('Update series'),
            'add_new_item' => __('Add series'),
            'new_item_name' => __('New series'),
            'menu_name' => __('Series'),
        ),
        // Control the slugs used for this taxonomy
        'rewrite' => array(
            'slug' => 'series', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
        ),
    ));
}

add_action('init', 'add_custom_taxonomies', 0);


/**
 * Changing excerpt length
 */
function custom_excerpt_length( $length ) {
	return 55;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Add nextpage button to editor.
 */
function wysiwyg_editor($mce_buttons) {
    $pos = array_search('wp_more',$mce_buttons,true);
    if ($pos !== false) {
        $tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
        $tmp_buttons[] = 'wp_page';
        $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
    }
    return $mce_buttons;
}
add_filter('mce_buttons','wysiwyg_editor');

function gregory_customise_allowedTags() {

    global $allowedtags;

    // remove unwanted tags
    $unwanted = array(
        'abbr',
        'acronym',
        'blockquote',
        'del',
        'strike',
        'strong',
        'q'
        );
    foreach ( $unwanted as $tag )
        unset( $allowedtags[$tag] );

    // add wanted tags
    $newTags = array(
        'u' => array()
        );
    $allowedtags = array_merge( $allowedtags, $newTags );

}

add_action('init', 'gregory_customise_allowedTags', 11 );