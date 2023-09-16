<?php
/**
 * @package Standard
 */

function standard_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'standard' ),
			'menu-2' => esc_html__( 'Secondary', 'standard' ),
			'menu-left-logocenter' => esc_html__( 'Logo Center Menu Left', 'standard' ),
			'menu-right-logocenter' => esc_html__( 'Logo Center Menu Right', 'standard' ),
		)
	);
}
add_action( 'after_setup_theme', 'standard_setup' );


function standard_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'standard_content_width', 640 );
}
add_action( 'after_setup_theme', 'standard_content_width', 0 );

function standard_widgets_init() {
	register_sidebar(
		array('name'          => esc_html__( 'Logo Header', 'standard' ),
			'id'            => 'widget-1',)
	);
	// register_sidebar(
	// 	array('name'          => esc_html__( 'Button Name', 'standard' ),
	// 		'id'            => 'widget-2',)
	// );
	register_sidebar(
		array('name'          => esc_html__( 'Collaborate Button Name', 'standard' ),
			'id'            => 'widget-3',)
	);
	// register_sidebar(
	// 	array('name'          => esc_html__( 'Widget 4', 'standard' ),
	// 		'id'            => 'widget-4',)
	// );
	// register_sidebar(
	// 	array('name'          => esc_html__( 'Widget 5', 'standard' ),
	// 		'id'            => 'widget-5',)
	// );
	register_sidebar(
		array('name'          => esc_html__( 'Job position Apply Button', 'standard' ),
			'id'            => 'widget-6',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Events Button Name', 'standard' ),
			'id'            => 'widget-7',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Footer 1', 'standard' ),
			'id'            => 'footer-1',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Footer 2', 'standard' ),
			'id'            => 'footer-2',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Footer 3', 'standard' ),
			'id'            => 'footer-3',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Footer 4', 'standard' ),
			'id'            => 'footer-4',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Contact Form Standard', 'standard' ),
			'id'            => 'contactform-1',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Contact Form Drag&Drop', 'standard' ),
			'id'            => 'contactform-2',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Contact Rorm Events', 'standard' ),
			'id'            => 'contactform-events',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Collaborate Contact Form', 'standard' ),
			'id'            => 'contactform-collaborate',)
	);
	// register_sidebar(
	// 	array('name'          => esc_html__( 'Search Result', 'standard' ),
	// 		'id'            => 'search-results',)
	// );
}
add_action( 'widgets_init', 'standard_widgets_init' );

function standard_scripts() {
	wp_enqueue_style( 'standard-style', get_stylesheet_uri() );
	wp_enqueue_style( 'standard-bootstrap-style', get_template_directory_uri() . '/src/css/bootstrap.min.css', array(), null );
	wp_enqueue_style( 'standard-main-style', get_template_directory_uri() . '/src/scss/style.css', array(), null );
	wp_enqueue_style( 'standard-awesome-style', get_template_directory_uri() . '/src/css/font-awesome.css', array(), null );
	wp_enqueue_style( 'standard-swiper-style', get_template_directory_uri() . '/src/css/swiper.css', array(), null );
	wp_enqueue_style( 'standard-aos-style', get_template_directory_uri() . '/src/css/aos.css', array(), null );


	wp_enqueue_script( 'standard-jquery-js', get_template_directory_uri() . '/src/js/jquery.js', array(), null, true );
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/src/js/bootstrap.min.js', array(), null, true );
	wp_enqueue_script( 'standard-aos-js', get_template_directory_uri() . '/src/js/aos.js', array(), null, true );
	wp_enqueue_script( 'standard-swiper-js', get_template_directory_uri() . '/src/js/swiper.js', array(), null, true );
	wp_enqueue_script( 'standard-main-js', get_template_directory_uri() . '/src/js/main.js', array(), null, true );
	wp_enqueue_script( 'standard-aos-js', get_template_directory_uri() . '/src/js/aos.js', array(), null, true );

}
add_action( 'wp_enqueue_scripts', 'standard_scripts' );

	// This function enable option to put PHP code inside Widget Custom HTML 
	add_filter('widget_text','execute_php',100);
	function execute_php($html){
		 if(strpos($html,"<"."?php")!==false){
			  ob_start();
			  eval("?".">".$html);
			  $html=ob_get_contents();
			  ob_end_clean();
		 }
		 return $html;
	}	
	add_filter('widget_text','do_shortcode',10);
	// END of function which enable PHP code inside Widget Custom HTML 

	function custom_breadcrumbs() {
		$separator = '&raquo;';
		$home = 'Home';
	 
		// Get the query object and the queried object
		$query_obj = get_queried_object();
		$queried_obj_id = $query_obj->ID;
		if (is_category() || is_tag() || is_tax()) {
			$term = $query_obj;
			$taxonomy = $term->taxonomy;
			$parents = array();
			while ($term->parent) {
				$term = get_term($term->parent, $taxonomy);
				$parents[] = $term;
			}
			echo '<a href="' . home_url() . '">' . $home . '</a> ' . $separator . ' ';
			for ($i = count($parents) - 1; $i >= 0; $i--) {
				echo '<a href="' . get_term_link($parents[$i]) . '">' . $parents[$i]->name . '</a> ' . $separator . ' ';
			}
			echo '<span class="current">' . single_term_title('', q) . '</span>';
	 
		} elseif (is_archive()) {
			if (is_day()) {
				printf(__('Daily Archives: %s', 'textdomain'), get_the_date());
			} elseif (is_month()) {
				printf(__('Monthly Archives: %s', 'textdomain'), get_the_date('F Y'));
			} elseif (is_year()) {
				printf(__('Yearly Archives: %s', 'textdomain'), get_the_date('Y'));
			} elseif (is_author()) {
				$author_id = get_query_var('author');
				$author_name = get_the_author_meta('display_name', $author_id);
				printf(__('Author Archives: %s', 'textdomain'), $author_name);
			} else {
				echo __('Archives', 'textdomain');
			}
		} elseif (is_search()) {
			echo '<a href="' . home_url() . '">' . $home . '</a> ' . $separator . ' ';
			echo __('Search Results for', 'textdomain') . ' "' . get_search_query() . '"';
		} elseif (is_404()) {
			echo '<a href="' . home_url() . '">' . $home . '</a> ' . $separator . ' ';
			echo __('404 Error', 'textdomain');
		} else {
			echo '<a href="' . home_url() . '">' . $home . '</a> ' . $separator . ' ';
			echo get_the_title($queried_obj_id);
		}
	}
	
	function custom_post_type() {
		$labels_frontpage = array(
			'name' => 'Courses & Events',
		);
		register_post_type('services', array(
			'labels' => $labels_frontpage,
			'public' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'revisions',
			),
			'menu_position' => 8,
			'exclude_from_search' => false,
			'menu_icon' => 'dashicons-slides',
		));
	
		$labels_frontpage = array(
			'name' => 'Job Posts',
		  );
			register_post_type('job', array(
			'labels' => $labels_frontpage,
			'public' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',),
			'menu_position' => 8,
			'exclude_from_search' => false,
			'menu_icon' => 'dashicons-slides',
			));


			$labels_frontpage = array(
				'name' => 'Reviews',
			  );
				register_post_type('testimonials-reviews', array(
				'labels' => $labels_frontpage,
				'public' => true,
				'has_archive' => true,
				'publicly_queryable' => true,
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'supports' => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'revisions',),
				'menu_position' => 8,
				'exclude_from_search' => false,
				'menu_icon' => 'dashicons-slides',
				));
		$labels_frontpage = array(
			'name' => 'Instructors',
		  );
			register_post_type('tutors', array(
			'labels' => $labels_frontpage,
			'public' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',),
			'menu_position' => 8,
			'exclude_from_search' => false,
			'menu_icon' => 'dashicons-admin-users',
			));

		$labels = array(
			'name' => 'Courses',
			'singular_name' => 'Category Post',
			'add_new' => 'Add item',
			'all_items' => 'All items',
			'add_new_item' => 'Add Item',
			'edit_item' => 'Edit Item',
			'new_item' => 'New Items',
			'view_item' => 'View Item',
			'search_item' => 'Search Categories Post',
			'not_found' => 'No items found',
			'not_found_in_trash' => 'No items found in trash',
			'parent_item_colon' => 'Parent Item'
		);
	
		register_taxonomy('categories', array('services'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'categories'),
		));
	}
	add_action('init', 'custom_post_type');
	

	