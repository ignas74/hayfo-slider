<?php

// use WC_Product_query;

class Product {
    public static function display_products( $query_array ) {
        $query = new WC_Product_query( $query_array );
    
        $products = $query->get_products();

        if ( ! empty( $products ) ) { 
            include( dirname( plugin_dir_path( __FILE__ ) ) . '/assets/index.php' ); 
        }
        else {
            echo '<div>';
            echo '<h3>Query did not find any products or there is not products at all.</h3>';
            echo '</div>';
        }
    }
}
