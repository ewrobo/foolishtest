<?php

/**--------------------------------------
Do on init
--------------------------------------**/
function fool_theme_enqueue() {
  $style = get_stylesheet_directory_uri();
  if (!is_admin()) {
    wp_enqueue_style('grid', $style.'/less/grid.less');
    wp_enqueue_style('main-theme', $style.'/less/main-theme.less');
  }
}
function fool_remove_gen() {
  remove_action('wp_head', 'wp_generator');
}

/**--------------------------------------
Init Functions
--------------------------------------**/
function fool_do_on_init() {
  fool_theme_enqueue();
  fool_remove_gen();
}
add_action('init', 'fool_do_on_init');

/**--------------------------------------
Custom Post Types
--------------------------------------**/

function register_post_types() {
	$stocks_labels = array(
		'name' => _x('Stock Recommendations', 'post type general name'),
		'singular_name' => _x('Stock Recommendation', 'post type singular name'),
		'add_new' => _x('Add New', 'products'),
		'add_new_item' => __('Add New Stock Recommendation'),
		'edit_item' => __('Edit Stock Recommendation'),
		'new_item' => __('New Stock Recommendation'),
		'view_item' => __('View Stock Recommendation'),
		'search_items' => __('Search Stock Recommendations'),
		'not_found' =>  __('No Stock Recommendations found'),
		'not_found_in_trash' => __('No Stock Recommendations found in Trash'),
		'menu_name' => 'Stock Recommendations'
	);
	$stocks_args = array(
		'labels' => $stocks_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-rest-api',
		'query_var' => true,
		'rewrite' => array('slug'=>'stock-recommendations', 'with_front'=>true, 'feeds'=>true, 'pages'=>true),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
	  'show_in_rest' => true,
		'supports' => array('title','editor','custom-fields','revisions','page-attributes')
	);
	register_post_type( 'stocks' , $stocks_args );

	$companies_labels = array(
		'name' => _x('Companies', 'post type general name'),
		'singular_name' => _x('Company', 'post type singular name'),
		'add_new' => _x('Add New', 'products'),
		'add_new_item' => __('Add New Company'),
		'edit_item' => __('Edit Company'),
		'new_item' => __('New Company'),
		'view_item' => __('View Company'),
		'search_items' => __('Search Companies'),
		'not_found' =>  __('No Companies found'),
		'not_found_in_trash' => __('No Companies found in Trash'),
		'menu_name' => 'Companies'
	);
	$companies_args = array(
		'labels' => $companies_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-admin-site-alt',
		'query_var' => true,
		'rewrite' => array('slug'=>'companies', 'with_front'=>true, 'feeds'=>true, 'pages'=>true),
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'supports' => array('title','custom-fields','revisions','page-attributes')
	);
	register_post_type( 'companies' , $companies_args );
}
add_action('init', 'register_post_types');

/**--------------------------------------
API Requests
--------------------------------------**/
function fool_request_info( $company_symbol = null ) {
  global $post; setup_postdata($post);

  $url_info = array(
      'profile' => "https://financialmodelingprep.com/api/company/profile/" . $company_symbol . "?datatype=json",
      'price' => "https://financialmodelingprep.com/api/company/real-time-price/" . $company_symbol . "?datatype=json"
  );

  $i = array();
  set_time_limit(0);
  foreach ($url_info as $info) {
      $channel = curl_init();

      curl_setopt($channel, CURLOPT_AUTOREFERER, TRUE);
      curl_setopt($channel, CURLOPT_HEADER, 0);
      curl_setopt($channel, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($channel, CURLOPT_URL, $info);
      curl_setopt($channel, CURLOPT_FOLLOWLOCATION, TRUE);
      curl_setopt($channel, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
      curl_setopt($channel, CURLOPT_TIMEOUT, 0);
      curl_setopt($channel, CURLOPT_CONNECTTIMEOUT, 0);
      curl_setopt($channel, CURLOPT_SSL_VERIFYHOST, FALSE);
      curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, FALSE);

      $output = curl_exec($channel);

      if (curl_error($channel)) {
          return 'error:' . curl_error($channel);
      } else {
          $i[] = json_decode($output);
      }

  }

  $GLOBALS['fool_request_info'] = $i;

}

?>
