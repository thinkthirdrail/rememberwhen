<?php
// Enqueue Styles/Scripts
function rw_styles()
{
    wp_enqueue_style( 'reset', get_template_directory_uri().'/css/reset.css' );
    wp_enqueue_style( 'anim', get_template_directory_uri().'/css/animate.css' );
    wp_enqueue_style( 'icon', get_template_directory_uri().'/css/font-awesome.min.css' );
    wp_enqueue_style( 'style', get_stylesheet_uri() ,array(), time() );
    wp_enqueue_style( 'responsive', get_template_directory_uri().'/css/responsive.css' , array(), filemtime(get_template_directory() . '/css/responsive.css'), false);
    // wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css' );
	
	//wp_enqueue_script( 'parallax', get_template_directory_uri().'/js/parallax.min.js' );
    wp_enqueue_script( 'scripts', get_template_directory_uri().'/js/scripts.js',array(),false,true );
    //wp_enqueue_script( 'zoom', get_template_directory_uri().'/js/easyzoom.js' );
    wp_enqueue_script( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js',array(),false,true );
	
	
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

            'taxonomies'  => array( 'category' ),
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

// // Hide Custom Fields Menu to anyone except admin
//
// add_filter('acf/settings/show_admin', 'my_acf_show_admin');
//
// function my_acf_show_admin( $show ) {
//
//     return current_user_can('manage_options');
//
// }

// Add thumbnails
add_theme_support( 'post-thumbnails' );

// Async load
function async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async";
    }
add_filter( 'clean_url', 'async_scripts', 11, 1 );

// Archive Pagination
add_action( 'pre_get_posts', 'wpsites_cpt_archive_items' );
function wpsites_cpt_archive_items( $query ) {
if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'items' || 'projects' ) ) {
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

// Change Posts to Projects
function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Projects';
    $submenu['edit.php'][5][0] = 'Projects';
    $submenu['edit.php'][10][0] = 'Add Project';
    $submenu['edit.php'][16][0] = 'Project Tags';

}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Projects';
    $labels->singular_name = 'Project';
    $labels->add_new = 'Add Project';
    $labels->add_new_item = 'Add Project';
    $labels->edit_item = 'Edit Project';
    $labels->new_item = 'Project';
    $labels->view_item = 'View Projects';
    $labels->search_items = 'Search Projects';
    $labels->not_found = 'No Projects found';
    $labels->menu_icon = 'dashicons-editor-table';
    $labels->not_found_in_trash = 'No Projects found in Trash';
    $labels->all_items = 'All Projects';
    $labels->menu_name = 'Projects';
    $labels->name_admin_bar = 'Projects';

}

add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );

// Hide ACF
add_filter('acf/settings/show_admin', '__return_false');


// TEST

function ajax_filter_posts_scripts() {
  // Enqueue script
  wp_register_script('afp_script', get_template_directory_uri() . '/js/ajax-filter-posts.js', false, null, false);
  wp_enqueue_script('afp_script');

  wp_localize_script( 'afp_script', 'afp_vars', array(
        'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // Create nonce which we later will use to verify AJAX request
        'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
      )
  );
}
add_action('wp_enqueue_scripts', 'ajax_filter_posts_scripts', 100);

// Script for getting posts
function ajax_filter_get_posts( $taxonomy ) {

  // Verify nonce
  if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
    die('Permission denied');

  $taxonomy = $_POST['taxonomy'];

  // WP Query
  $args = array(
    'category_name' => $taxonomy,
    'post_type' => 'items',
    'posts_per_page' => 10,
  );
  echo $taxonomy;
  // If taxonomy is not set, remove key from array and get all posts
  if( !$taxonomy ) {
    unset( $args['tag'] );
  }

  $query = new WP_Query( $args );

  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php the_excerpt(); ?>

  <?php endwhile; ?>
  <?php else: ?>
    <h2>No posts found</h2>
  <?php endif;

  die();
}

add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');

function rw_widgets_init() {

	register_sidebar( array(
		'name'          => 'Project Category',
		'id'            => 'project-cat',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'rw_widgets_init' );

add_filter( 'get_terms_args', 'wpse_53094_sort_get_terms_args', 10, 2 );
function wpse_53094_sort_get_terms_args( $args, $taxonomies )
{
    global $pagenow;
    if( !is_admin() || ('project.php' != $pagenow && 'post-new.php' != $pagenow) )
        return $args;

    $args['orderby'] = 'name';
    $args['order'] = 'ASC';

    return $args;
}
//include_once 'wordpress-snippets-html-minify.php';
?>
