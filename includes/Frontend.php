<?php

namespace Frontend;

use Enqueue\EnqueueScripts;
use WC_Product_query;
use Queries as Q;

class Frontend {
    private $frames_number;

    /**
     * @TODO Setter for $frames_number in create_shortcode()
     */
    public function __construct( $frames_number ) {
        $this->frames_number = $frames_number;
    }

    function register() {
        /**
         * @TODO more than 2 shortcodes? Adjust checking in create_shortcode().
         */
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
            'frames' => '4'
        ), $atts );

        $frames_number = $attributes['frames'];
        new EnqueueScripts( $frames_number );

        /**
         * @TODO better checking, if more than 2 shortcodes.
         */
        ob_start();
        echo "$title";
        $title === "Latest Products" ? $this->display_products( Q::latest_query_array() ) : $this->display_products( Q::popular_query_array() );
        return ob_get_clean();
    }

    function display_products( $query_array ) {
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
