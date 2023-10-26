<?php

/*
 * Plugin Name:       Hayfo Slider
 * Plugin URI:        http://www.ignas.click
 * Description:       Slider USING THIS ONE
*/

/**
 * Queries:
 * Latest products, Most popular products, Same collection products
 * 
 * Admin panel settings, multiple shortcodes for each query
 */

if (!defined('ABSPATH')) { die; }

require_once plugin_dir_path( __FILE__ ) . 'includes/Init.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/Admin.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/Enqueue.php'; 

HayfoSlider\Init::initialize();

add_shortcode( 'hayfo-slider','create_shortcode' );

function create_shortcode() {
    ob_start();
    // get_latest_products();
    get_most_popular_products();
    return ob_get_clean();
}

function get_latest_products() {
    if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) { return 0; }

    $query = new WC_Product_query( array(
        'limit' => -1,
        'orderby'=> 'date',
        'order'=> 'DESC'
    ) );

    $products = $query->get_products();
    
    if ( ! empty( $products ) ) { require_once( 'assets/index.php' ); }
}

function get_most_popular_products() {
    if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) { return 0; }

    $query = new WC_Product_Query( array(
        'limit' => -1,
        'meta_key' => 'total_sales',
        'orderby' => array( 
            'meta_value_num' => 'DESC',
            'title' => 'ASC'
         )
    ) );

    $products = $query->get_products();

    if ( ! empty( $products ) ) { require_once( 'assets/index.php' ); }
}

