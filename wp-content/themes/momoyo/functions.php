<?php
/**
 * momoyo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package momoyo
 */

if ( ! function_exists( 'momoyo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function momoyo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on momoyo, use a find and replace
		 * to change 'momoyo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'momoyo', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'momoyo' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'momoyo_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );


		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );


        // Add custom header image
        add_theme_support( 'custom-header' );

        // Custom header image 
		$args = array(
		    'width'         => 1200,
		    'height'        => 400,
		    'flex-width'    => true,
		    'flex-height'    => true,
		    'default-image' => get_template_directory_uri() . '/images/default-image.jpg',
		    'uploads'       => true,
		);
		add_theme_support( 'custom-header', $args );


		// Add theme support for Custom Logo
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-width'  => true,
			'flex-height' => true,
			) );
		}
		endif;
		add_action( 'after_setup_theme', 'momoyo_setup' );


		function momoyo_content_width() {
			$GLOBALS['content_width'] = apply_filters( 'momoyo_content_width', 1000 );
		}
		add_action( 'after_setup_theme', 'momoyo_content_width', 0 );


		// Register widget area
		function momoyo_widgets_init() {
			register_sidebar( array(
				'name'          => esc_html__( 'Sidebar', 'momoyo' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'momoyo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
		}
		add_action( 'widgets_init', 'momoyo_widgets_init' );


// Enqueue scripts and styles.
function momoyo_scripts() {

	wp_enqueue_script( 'momoyo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'momoyo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), '3.3.7', false);
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.css', array(), false, 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css');
	wp_enqueue_style( 'momoyo-google-fonts', '//fonts.googleapis.com/css?family=Lora|Pacifico|Source+Sans+Pro');
	wp_enqueue_style( 'momoyo-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
// Code Category
add_action('woocommerce_single_product_summary','get_calories_of_products',10);
function get_calories_of_products(){
	global $product;
	?>
	<div class="product_calories">
		<h3><?=__('Hàm Lượng Calories: ', 'momoyo')?>
			<span><?=get_field('product_calories',$product->get_id())?></span>
		</h3>
	</div>
	<?php
}
add_action('woocommerce_cart_coupon','total_calories_of_order',10);
function total_calories_of_order(){
	global $woocommerce;
    $items 				= $woocommerce->cart->get_cart();
    $totalCalories 		= 0;
    foreach($items as $item => $values) {
    	$productID 		= $values['data']->get_id();
    	$quantity  		= $values['quantity'];
    	$calories  		= get_field('product_calories',$productID);
    	$totalCalories += $calories*$quantity;
    }
    ?>
   	<div class="cart_calories_total">
		<b><?=__('Hàm Lượng Calories:', 'momoyo')?></b>
		<span><?=$totalCalories?></span>
	</div>
	<?php
}
function search_filter_by_product($query) {
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('product'));
    }
return $query;
}
add_filter('pre_get_posts','search_filter_by_product');

function __search_by_title_only( $search, $wp_query )
{
    global $wpdb;
 
    if ( empty( $search ) )
        return $search; // skip processing - no search term in query
 
    $q = $wp_query->query_vars;    
    $n = ! empty( $q['exact'] ) ? '' : '%';
 
    $search =
    $searchand = '';
 
    foreach ( (array) $q['search_terms'] as $term ) {
        $term = esc_sql( like_escape( $term ) );
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
 
    if ( ! empty( $search ) ) {
        $search = " AND ({$search}) ";
        if ( ! is_user_logged_in() )
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
 
    return $search;
}
add_filter( 'posts_search', '__search_by_title_only', 500, 2 );

add_action( 'wp_enqueue_scripts', 'momoyo_scripts' );



		// Implement the Custom Header feature.
		require get_template_directory() . '/inc/custom-header.php';

		// Custom template tags for this theme.
		require get_template_directory() . '/inc/template-tags.php';

		// Functions which enhance the theme by hooking into WordPress.
		require get_template_directory() . '/inc/template-functions.php';

		// Customizer additions.
		require get_template_directory() . '/inc/customizer.php';

		// Load Jetpack compatibility file.
		if ( defined( 'JETPACK__VERSION' ) ) {
			require get_template_directory() . '/inc/jetpack.php';
		}

		// Custom excerpt 
		add_action( 'wp_enqueue_scripts', 'momoyo_scripts' );

		function momoyo_new_excerpt( $more ) {
			return '...';
		}
		add_filter('excerpt_more', 'momoyo_new_excerpt');
