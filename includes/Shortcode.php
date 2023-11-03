<?php

class Shortcode {
    private $frames_number, $query, $product_display;

    public function __construct( Query $query, Product $product_display, $frames_numbers = '4' ) {
        $this->query = $query;
        $this->product_display = $product_display;
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
            // Value checking
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
        echo "$title"; // Where to transfer it
        $this->decider( $title );
        return ob_get_clean();
    }

    function decider( $title ) {
        switch( $title ) {
            case 'Latest Products':
                $this->product_display->display_products( $this->query->latest_query_array() );
                break;
            case 'Most Popular Products':
                $this->product_display->display_products( $this->query->popular_query_array() );
                break;
            case 'On Sale Products':
                $this->product_display->display_products( $this->query->on_sale_query_array() );
                break;
        }
    }
}
