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
        $shortcodes = array(
            'hayfo-slider-wc-latest' => 'Latest Products',
            'hayfo-slider-wc-popular' => 'Most Popular Products',
            'hayfo-slider-wc-onsale' => 'On Sale Products'
        );

        foreach( $shortcodes as $shortcode => $title ) {
            add_shortcode( $shortcode, function( $atts ) use ( $title ) {
                return $this->create_shortcode( $atts, $title );
            } );
        }
    }

    function create_shortcode( $atts, $title ) {
        $frames = shortcode_atts( array( 'frames' => '4' ), $atts )['frames'];

        $this->setFrames( $frames );

        ob_start();
        echo "$title";
        // Product::display_products( $title === "Latest Products" ? Query::latest_query_array() : Query::popular_query_array() ); 

        // improve case checking

        switch( $title ) {
            case 'Latest Products':
                Product::display_products( Query::latest_query_array() );
                break;
            case 'Most Popular Products':
                Product::display_products( Query::popular_query_array() );
                break;
            case 'On Sale Products':
                Product::display_products( Query::on_sale_query_array() );
                break;
        }
        return ob_get_clean();
    }
}
