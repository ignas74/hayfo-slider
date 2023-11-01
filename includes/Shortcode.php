<?php

class Shortcode {
    private $frames_number;

    public function __construct( $frames_numbers = '4' ) {
        $this->frames_number = $frames_numbers;
    }

    function getFrames() {
        return $this->frames_number;
    }

    function setFrames( $frames_number ) {
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
        $frames = shortcode_atts( array( 'frames' => '4' ), $atts )['frames'];

        var_dump( $frames );

        $this->setFrames( $frames );

        /**
         * @TODO better checking, if more than 2 shortcodes.
         */
        ob_start();
        echo "$title";
        $title === "Latest Products" ? 
            Product::display_products( Query::latest_query_array() ) : 
            Product::display_products( Query::popular_query_array() );
        return ob_get_clean();
    }

}
