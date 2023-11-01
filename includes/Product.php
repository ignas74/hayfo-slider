<?php

// use WC_Product_query;

class Product {
    public static function display_products( $query_array ) { // Query::
        /**
         * @TODO error handling if !woocommerce.
         */
        if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) { return 0; }

        $query = new WC_Product_query( $query_array );
    
        $products = $query->get_products();

        /**
         * @TODO include instead of require? require throws Fatal Error, include throws just a Warning.
         */
        if ( ! empty( $products ) ) { require( dirname( plugin_dir_path( __FILE__ ) ) . '/assets/index.php' ); }
    }
}