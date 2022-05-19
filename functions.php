<?php 
function action_register_nav_menu(){
	register_nav_menus( array(
		'primary-menu' => __( 'Header Menu', 'text_domain' ),
		'footer-menu' => __( 'Footer Menu', 'text_domain' ),
	) );
}
add_action( 'after_setup_theme', 'action_register_nav_menu', 0 );

if( function_exists('acf_add_options_page') ) {
	

    acf_add_options_page(array(
		'page_title' 	=> 'Theme settings',
		'menu_title'	=> 'Theme settings',
		'menu_slug' 	=> 'theme-header-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	
	
}

function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyDnhiZi8t4tNB0i8AU1wpxOsgwl21LG0_c');
}

add_action('acf/init', 'my_acf_init');

function my_acf_init_block_types() {

   
    if( function_exists('acf_register_block_type') ) {

      
        acf_register_block_type(array(
            'name'              => 'image-header-text',
            'title'             => __('Image with header and text'),
            'render_template'   => 'template-parts/blocks/image-header-text.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'image-header-text' ),
        ));  
		
		acf_register_block_type(array(
            'name'              => 'header-content',
            'title'             => __('Header and text content'),
            'render_template'   => 'template-parts/blocks/header-content.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'header-content' ),
        ));
    }
}

add_action('acf/init', 'my_acf_init_block_types');


function theme_scripts() {

    wp_enqueue_style( 'slick-style', get_theme_file_uri( '/bower_components/slick-carousel/slick/slick.css' ), array(), file_exists( get_theme_file_path('/bower_components/slick-carousel/slick/slick.css') ) ? filemtime( get_theme_file_path('/bower_components/slick-carousel/slick/slick.css') ) : '0.0' );
    wp_enqueue_style( 'slick-theme-style', get_theme_file_uri( '/bower_components/slick-carousel/slick/slick-theme.css' ), array(), file_exists( get_theme_file_path('/bower_components/slick-carousel/slick/slick-theme.css') ) ? filemtime( get_theme_file_path('/bower_components/slick-carousel/slick/slick-theme.css') ) : '0.0' );
    wp_enqueue_script( 'samplejs', get_theme_file_uri( '/public/js/header.js' ), array(), file_exists( get_theme_file_path('/public/js/header.js') ) ? filemtime( get_theme_file_path('/public/js/header.js') ) : '0.0', true );
       
    wp_enqueue_script( 'slick', get_theme_file_uri( '/bower_components/slick-carousel/slick/slick.min.js' ), array(), file_exists( get_theme_file_path('/bower_components/slick-carousel/slick/slick.min.js') ) ? filemtime( get_theme_file_path('/bower_components/slick-carousel/slick/slick.min.js') ) : '0.0', false );
	wp_enqueue_style( 'lightbox-style', get_theme_file_uri( '/bower_components/lightbox2/dist/css/lightbox.min.css' ), array(), file_exists( get_theme_file_path('/bower_components/lightbox2/dist/css/lightbox.min.css') ) ? filemtime( get_theme_file_path('/bower_components/lightbox2/dist/css/lightbox.min.css') ) : '0.0' );
    wp_enqueue_script( 'samplejs', get_theme_file_uri( '/public/js/header.js' ), array(), file_exists( get_theme_file_path('/public/js/header.js') ) ? filemtime( get_theme_file_path('/public/js/header.js') ) : '0.0', true );
    wp_enqueue_script( 'lightbox', get_theme_file_uri( '/bower_components/lightbox2/src/js/lightbox.js' ), array(), file_exists( get_theme_file_path('/bower_components/lightbox2/src/js/lightbox.js') ) ? filemtime( get_theme_file_path('/bower_components/lightbox2/src/js/lightbox.js') ) : '0.0', true );
    wp_enqueue_script( 'js', get_theme_file_uri( '/public/js/slider.js' ), array('jquery'), '0.0.0', false );
         
  
      wp_enqueue_style( 'scss', get_theme_file_uri( '/public/css/app.css' ), array(), file_exists( get_theme_file_path('/public/css/app.css') ) ? filemtime( get_theme_file_path('/public/css/app.css') ) : '0.0' );
      wp_deregister_script('jquery');
      wp_deregister_script('google-recaptcha');
      wp_enqueue_script( 'jquery', get_theme_file_uri( '/bower_components/jquery/dist/jquery.min.js' ), array(), file_exists( get_theme_file_path('/bower_components/jquery/dist/jquery.min.js') ) ? filemtime( get_theme_file_path('/bower_components/jquery/dist/jquery.min.js') ) : '0.0', false );
       wp_enqueue_style( 'twd-googlefonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', array(), null );

       wp_enqueue_script( 'googlemap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhiZi8t4tNB0i8AU1wpxOsgwl21LG0_c', NULL, '1.0.0', true);
   


  }
  add_action( 'wp_enqueue_scripts', 'theme_scripts' );
  

  
  add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
  function wc_refresh_mini_cart_count($fragments){
      ob_start();
      $items_count = WC()->cart->get_cart_contents_count();
      if($item_count == false) {
          $item_count = '0';
      }
      ?>

<p class="header__cart-counter"><?php echo $items_count ?></p>
<?php
          $fragments['.header__cart-counter'] = ob_get_clean();
      return $fragments;
  }
  
  function wpdocs_my_search_form( $form ) {
	if(ICL_LANGUAGE_CODE=='pl'): 
		$searchinput = 'Szukaj'; 
	elseif(ICL_LANGUAGE_CODE=='en'): 
		$searchinput = 'Search'; 
		 endif; 
		 
        $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
        <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
        <input class="textchange" type="text" placeholder="'. $searchinput .'" value="' . get_search_query() . '" name="s" id="s" />
        <input type="image" id="searchsubmit" alt="submit"  src="' . get_template_directory_uri().'/public/images/ikona_szukaj.webp" />
        '. do_action( 'wpml_add_language_form_field' )
         .'
        </div>
        </form>';
     
        return $form;
    }
    
    add_filter( 'get_search_form', 'wpdocs_my_search_form' );


    add_action('woocommerce_after_shop_loop_item', 'wpt_custom_button_view_product', 5 );
function wpt_custom_button_view_product() {
    global $product;
    // Ignore for Variable and Group products
    if( $product->is_type('variable') || $product->is_type('grouped') ) return;
    // Display the custom button
    echo '<a style="margin-right:5px" class="button wpt-custom-button-view-product" href="' . esc_attr( $product->get_permalink() ) . '">' . get_field('check_product_button', 'option') . '</a>';
}


add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
 
    global $product;
    $addToCart = get_field('add_to_cart_button', 'option');
    $askForPrice = get_field('ask_for_price_button', 'option');
    if( $product->get_price() == 0 ) {
        return __( "$askForPrice", 'woocommerce' );
    } else {
        return __( "$addToCart", 'woocommerce' );
    }
}


add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {


    global $product;
 $addToCart = get_field('add_to_cart_button', 'option');
 $askForPrice = get_field('ask_for_price_button', 'option');
    if( $product->get_price() == 0 ) {
        return __( "$askForPrice", 'woocommerce' );
    } else {
        return __( "$addToCart", 'woocommerce' );
    }
}


function dragma_post_type() {
    


    register_post_type( 'recipes', array(
      'label'               => __( 'Przepisy', 'textdomain' ),
      'public'              => true,
      'exclude_from_search' => false,
      'show_in_nav_menus'   => false,
      'show_in_rest' => true,
      'menu_icon'           => 'dashicons-pressthis',
      'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields','excerpt'  ),
      'rewrite'             => [
          'slug' => 'recipes'
      ],
      'has_archive'           => true,
      'hierarchical'          => false,
      'publicly_queryable'  => true,
      'menu_position' => 20,
      
  ));
  $labels = array(
      'name' => _x( 'Przepisy kategorie', 'taxonomy general name' ),
      'singular_name' => _x( 'Przepisy kategorie', 'taxonomy singular name' ),
      'search_items' =>  __( 'Przepisy' ),
      'all_items' => __( 'Wszystkie wpisy' ),
      'parent_item' => __( 'Parent Type' ),
      'parent_item_colon' => __( 'Parent Type:' ),
      'edit_item' => __( 'Edit' ), 
      'update_item' => __( 'Edit' ),
      'add_new_item' => __( 'New category' ),
      'new_item_name' => __( 'New Type Name' ),
      'menu_name' => __( 'Przepisy category' ),
    ); 	


    register_post_type( 'chwalaprzekornym', array(
        'label'               => __( 'Chwała przekornym', 'textdomain' ),
        'public'              => true,
        'exclude_from_search' => false,
        'show_in_nav_menus'   => false,
        'show_in_rest' => true,
        'menu_icon'           => 'dashicons-pressthis',
        'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields','excerpt'  ),
        'rewrite'             => [
            'slug' => 'chwalaprzekornym'
        ],
        'has_archive'           => true,
        'hierarchical'          => false,
        'publicly_queryable'  => true,
        'menu_position' => 20,
        
    ));
    $labels = array(
        'name' => _x( 'Chwała przekornym kategorie', 'taxonomy general name' ),
        'singular_name' => _x( 'Chwała przekornym kategorie', 'taxonomy singular name' ),
        'search_items' =>  __( 'Chwała przekornym' ),
        'all_items' => __( 'Wszystkie wpisy' ),
        'parent_item' => __( 'Parent Type' ),
        'parent_item_colon' => __( 'Parent Type:' ),
        'edit_item' => __( 'Edit' ), 
        'update_item' => __( 'Edit' ),
        'add_new_item' => __( 'New category' ),
        'new_item_name' => __( 'New Type Name' ),
        'menu_name' => __( 'Chwała przekornym category' ),
      ); 	
           
  }
  
  add_action('init', 'dragma_post_type');


  if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Name of Widgetized Area',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);



function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');

add_action( 'admin_bar_menu', 'clean_admin_bar', 999 );
function clean_admin_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'comments' );
}

add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}




add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );


// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
  }
  add_action( 'admin_head', 'fix_svg' );