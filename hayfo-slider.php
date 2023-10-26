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

add_shortcode( 'hayfo-slider','create_shortcode' );
add_action( 'wp_enqueue_scripts', 'enqueue' );

function enqueue() {
    wp_enqueue_style( 'hayfo-slider-styles', plugins_url( 'assets/slider-styles.css', __FILE__) ); 
    wp_enqueue_script( 'hayfo-slider-scripts', plugins_url( 'assets/slider-script.js', __FILE__ ) );
}

function create_shortcode() {
    ob_start();
    // get_latest_products();
    get_most_popular_products();
    return ob_get_clean();
}

function get_latest_products() {
    if( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) { return 0; }

    $query = new WC_Product_query( array(
        'limit' => -1,
        'orderby'=> 'date',
        'order'=> 'DESC'
    ) );

    $products = $query->get_products();
    
    if ( ! empty( $products ) ) { require_once( 'assets/index.php' ); }
}

function get_most_popular_products() {
    if( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) { return 0; }

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
