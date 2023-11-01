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
            ?>
                <div class="hfo-slider-err">
                    <h3><?php __( 'Query did not find any products or there is not products at all.', 'hayfo-slider') ?></h3>
                </div>
            <?php
        }
    }
}
