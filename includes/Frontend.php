<?php

namespace Frontend;

use WC_Product_query;
use Queries as Q;

class Frontend {
    function register() {
        $shortcodes = array(
            'hayfo-slider-wc-latest' => 'Latest Products',
            'hayfo-slider-wc-popular' => 'Most Popular Products'
        );

        foreach( $shortcodes as $shortcode => $title ) {
            add_shortcode( $shortcode, function( $atts ) use ( $title ) {
                return $this->create_shortcode( $atts, $title );
            } );
        }
    }

    function create_shortcode( $atts, $title ) {
        $attributes = shortcode_atts( array (
            'frames' => 4
        ), $atts );

        ob_start();
        echo "$title";
        $title === "Latest Products" ? $this->display_products( Q::latest_query_array() ) : $this->display_products( Q::popular_query_array() );
        return ob_get_clean();
    }

    function display_products( $query_array ) {
        if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) { return 0; }

        $query = new WC_Product_query( $query_array );
    
        $products = $query->get_products();

        if ( ! empty( $products ) ) { require( dirname( plugin_dir_path( __FILE__ ) ) . '/assets/index.php' ); }
    }

    // function popular_query_array() {
    //     return array (
    //         'limit' => -1,
    //         'meta_key' => 'total_sales',
    //         'orderby' => array( 
    //             'meta_value_num' => 'DESC',
    //             'title' => 'ASC'
    //         )
    //     );
    // }

    // function latest_query_array() {
    //     return array (
    //         'limit' => -1,
    //         'orderby'=> 'date',
    //         'order'=> 'DESC'
    //     );
    // }
}

/*
    add_shortcode( 'hayfo-slider-wc-latest-products', array( $this, 'create_shortcode_for_latest_products' ) );
    add_shortcode( 'hayfo-slider-wc-most-popular-products', array( $this, 'create_shortcode_for_most_popular_products' ) );
*/

/*
    function create_shortcode_for_latest_products( $atts ) {
        $attributes = shortcode_atts( array (
            'frames' => 4
        ), $atts );
        
        ob_start();
        echo '<h3>Latest Products:</h3>';
        $this->display_products( $this->latest_query_array() );
        return ob_get_clean();
    }

    function create_shortcode_for_most_popular_products( $atts ) {
        $attributes = shortcode_atts( array (
            'frames' => 4,
        ), $atts );

        ob_start();
        echo '<h3>Most Popular Products:</h3>';
        $this->display_products( $this->popular_query_array() );
        return ob_get_clean();
    }
    */


/*
    function get_latest_products() {
        if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) { return 0; }
    
        $query = new WC_Product_query( array(
            'limit' => -1,
            'orderby'=> 'date',
            'order'=> 'DESC'
        ) );
    
        $products = $query->get_products();
        
        if ( ! empty( $products ) ) { require( dirname( plugin_dir_path( __FILE__ ) ) . '/assets/index.php' ); }
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

        if ( ! empty( $products ) ) { require( dirname( plugin_dir_path( __FILE__ ) ) . '/assets/index.php' ); }
    }
}    
*/