<?php

class Enqueue {
    private $shortcode;

    public function setShortcode( Shortcode $shortcode ) {
        $this->shortcode = $shortcode;
    }

    function register() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
    }

    function enqueue() {
        wp_enqueue_script( 'jquery' );
        wp_enqueue_style( 'slick-slider-styles', dirname( plugin_dir_url( __FILE__ ) ) . '/assets/slick.css' );
        wp_enqueue_style( 'slick-slider-theme-styles', dirname( plugin_dir_url( __FILE__ ) ) . '/assets/slick-theme.css' );
        wp_enqueue_style( 'slick-slider-custom-styles', dirname( plugin_dir_url( __FILE__ ) ) . '/assets/slick-custom.css' );
        wp_enqueue_script( 'slick-slider-scripts', dirname( plugin_dir_url( __FILE__ ) ) . '/assets/slick.min.js', array( 'jquery' ), null, true );
        wp_enqueue_script( 'hayfo-slider-scripts', dirname( plugin_dir_url( __FILE__ ) ) . '/assets/slider-script.js', array( 'jquery' ), null, true );

        wp_localize_script( 'hayfo-slider-scripts', 'frames', array(
            'value' => $this->shortcode->getFrames(),
        ));
    }
}
