<?php 
/********************************************************************************************************/
/* CONSTANTS */
/********************************************************************************************************/

define("THEMEROOT", get_stylesheet_directory_uri());
define("IMG", THEMEROOT."/assets/images");
define("JS", THEMEROOT."/assets/js");
define("CSS", THEMEROOT."/assets/css");

/********************************************************************************************************/
/* MENUS */
/********************************************************************************************************/

function register_my_menus(){
	register_nav_menus(array(    
		'main-menu' => __('Main Menu', 'blink'),
	));
}

add_action('init', 'register_my_menus');

/********************************************************************************************************/
/* LOAD ASSETS */
/********************************************************************************************************/

add_action('wp_enqueue_scripts', 'load_scripts');

function load_scripts(){
	wp_enqueue_style( 'stylecss', get_stylesheet_uri() );
	wp_enqueue_script('$', THEMEROOT.'/assets/js/jquery-1.9.1.min.js', array(), '', false);
	wp_enqueue_script('mainjs', THEMEROOT.'/assets/js/main.js', array('$'), '', true);
}
/********************************************************************************************************/
/* ADD POST THUMBNAIL SUPPORT */
/********************************************************************************************************/

if(function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(940, 346);
}

/********************************************************************************************************/
/* ADD WOOCOMMERCE SUPPORT */
/********************************************************************************************************/

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '';
}

function my_theme_wrapper_end() {
  echo '';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/********************************************************************************************************/
/* */
/********************************************************************************************************/

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<div id="breadcrumbs" class="woocommerce-breadcrumb" itemprop="breadcrumb">
        						<div class="container">
						            <div class="row">
						              <div class="col-md-12">
						                <div class="breadcrumbs"><ul>',
            'wrap_after'  => '</ul></div></div></div></div></div>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}

/********************************************************************************************************/
/* Redirect to checkout after added to cart */
/********************************************************************************************************/

add_filter ('add_to_cart_redirect', 'redirect_to_checkout');

function redirect_to_checkout() {
    global $woocommerce;
    $checkout_url = $woocommerce->cart->get_checkout_url();
    return $checkout_url;
}

/********************************************************************************************************/
/* Order checkout fields */
/********************************************************************************************************/

/********************************************************************************************************/
/* Remove & Overwrite  checkout fields */
/********************************************************************************************************/

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {     
     $fields['billing']['billing_email']['placeholder'] = 'Your email address';
     $fields['billing']['billing_address_1']['placeholder'] = 'Your address. E.g apartment, unit, suite, etc. (optional)';
     $fields['billing']['billing_address_1']['type'] = 'textarea';     

     $fields['billing']['billing_address_2']['placeholder'] = 'Your state / province';
     $fields['billing']['billing_address_2']['label'] = 'STATE / PROVINCE';

     $fields['billing']['billing_postcode']['placeholder'] = 'Your postcode / zip';

     $fields['billing']['billing_phone']['required'] = false;
     $fields['billing']['billing_company']['required'] = false;

     $fields['billing']['billing_country'] = array(
		'type'      => 'select',
		'label'     => __('Country', 'woocommerce'),
		'options' 	=> array('SG' => 'Singapore'),
		'required' 	=> true
	);

    unset($fields['billing']['billing_company']);

    $order = array(
        "billing_first_name", 
        "billing_last_name", 
        "billing_country",
        "billing_postcode",        
        "billing_email",
        "billing_address_1"
    );
    foreach($order as $field)
    {
        $ordered_fields[$field] = $fields["billing"][$field];
    }

    $fields["billing"] = $ordered_fields;
     
    return $fields;
}

/********************************************************************************************************/
/* Cart item thumbnail size */
/********************************************************************************************************/

add_image_size( 'cart_item_image_size', 105, 105, true );
add_filter( 'woocommerce_cart_item_thumbnail', 'cart_item_thumbnail', 10, 3 );

function cart_item_thumbnail( $thumb, $cart_item, $cart_item_key ) { 
 // create the product object 
 $product = get_product( $cart_item['product_id'] );
 return $product->get_image( 'cart_item_image_size' ); 
} 

/********************************************************************************************************/
/* billing fields custom errors */
/********************************************************************************************************/

function my_woocommerce_add_error( $error ) {
    if (strpos($error,'Billing First Name') !== false) {
        $error = '<strong>First Name</strong> is a required field';
    }
    if (strpos($error,'Billing Last Name') !== false) {
        $error = '<strong>Last Name</strong> is a required field';
    }
    if (strpos($error,'Billing Postcode / ZIP') !== false) {
        $error = '<strong>Postcode / ZIP</strong> is a required field';
    }
    if (strpos($error,'Billing Email Address') !== false) {
        $error = '<strong>Email Address</strong> is a required field';
    }
    if (strpos($error,'Billing Address') !== false) {
        $error = '<strong>Address</strong> is a required field';
    }
    return $error;
}
add_filter( 'woocommerce_add_error', 'my_woocommerce_add_error' );