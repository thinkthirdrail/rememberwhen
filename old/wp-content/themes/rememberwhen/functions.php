<?php
// Enqueue Styles/Scripts
function rw_styles()
{
    wp_enqueue_style( 'reset', get_template_directory_uri().'/css/reset.css' );
    wp_enqueue_script( 'parallax', get_template_directory_uri().'/js/parallax.min.js' );
    wp_enqueue_script( 'scripts', get_template_directory_uri().'/js/scripts.js' );
    wp_enqueue_script( 'zoom', get_template_directory_uri().'/js/easyzoom.js' );
    wp_enqueue_style( 'icon', get_template_directory_uri().'/css/font-awesome.min.css' );
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'responsive', get_template_directory_uri().'/css/responsive.css' );
}
add_action( 'wp_enqueue_scripts', 'rw_styles' );

// Add Bespoke Footer text
function remove_footer_admin()
{
    echo 'Designed & Built by Scott @ <a href="http://www.websmartstudio.co.uk">Websmart</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


// Register Menus
function register_my_menus() {
  register_nav_menus(
    array(
      'main-navigation' => __( 'Main Navigation' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Add RW Products Post Type
function create_posttype() {

	register_post_type( 'items',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Items For Sale' ),
				'singular_name' => __( 'Item' ),
                'new_item' => __( 'New Item' ),
                'add_new' => __( 'Add New Item' ),
                'add_new_item' => __( 'Add New Item' ),
                'view_item' => __( 'View Item' ),
                'edit_item' => __( 'Edit Item' ),
                'all_items' => __( 'View All' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'items'),
            'menu_icon'           => 'dashicons-screenoptions',
            'menu_position' => 25,
            'supports' => array('title','thumbnail','editor','page-attributes','excerpt')
		)
	);


}

add_action( 'init', 'create_posttype' );

// Hide Custom Fields Menu to anyone except admin

add_filter('acf/settings/show_admin', 'my_acf_show_admin');

function my_acf_show_admin( $show ) {

    return current_user_can('manage_options');

}

// Add thumbnails
add_theme_support( 'post-thumbnails' );

// Async load
function ikreativ_async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async";
    }
add_filter( 'clean_url', 'ikreativ_async_scripts', 11, 1 );

// Archive Pagination
add_action( 'pre_get_posts', 'wpsites_cpt_archive_items' );
function wpsites_cpt_archive_items( $query ) {
if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'items' ) ) {
		$query->set( 'posts_per_page', '5' );
	}

}

function pagination_bar() {
    global $wp_query;

    $total_pages = $wp_query->max_num_pages;

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}
add_filter( 'wpcf7_validate_configuration', '__return_false' );

// Title Tag
function title_tag() {
global $page, $paged;
wp_title('|', true, 'right');
bloginfo('name');
$site_description = get_bloginfo('description', 'display');
if ($site_description && (is_home() || is_front_page()))
echo " | $site_description";
if ($paged >= 2 || $page >= 2)
echo ' | ' . sprintf(__('Page %s', 'hs'), max($paged, $page));
}
?>
