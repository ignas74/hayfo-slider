<?php

namespace Query;

use WC_Product_query;

class Queries {
    function register() {
        add_shortcode( 'hayfo-slider', array( $this, 'create_shortcode' ) );
    }

    function create_shortcode() {
        ob_start();
        // $this->get_latest_products();
        $this->get_most_popular_products();
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
        
        if ( ! empty( $products ) ) { require_once( dirname( plugin_dir_path( __FILE__ ) ) . '/assets/index.php' ); }
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

        if ( ! empty( $products ) ) { require_once( dirname( plugin_dir_path( __FILE__ ) ) . '/assets/index.php' ); }
    }
}    



