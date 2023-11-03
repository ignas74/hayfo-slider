<?php

class Enqueue {
    private $shortcode;

    public function __construct( Shortcode $shortcode ) {
        $this->shortcode = $shortcode;
    }

    function register() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
    }

    function enqueue() {
        wp_register_style( 'slick-slider-styles', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/slick.css' );
        wp_register_style( 'slick-slider-theme-styles', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/slick-theme.css' );
        wp_register_style( 'slick-slider-custom-styles', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/slick-custom.css' );
        wp_register_script( 'slick-slider-scripts', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/slick.min.js', array( 'jquery' ), null, true );
        wp_register_script( 'hayfo-slider-scripts', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/slider-script.js', array( 'jquery' ), null, true );

        wp_enqueue_style( 'slick-slider-styles' );
        wp_enqueue_style( 'slick-slider-theme-styles' );
        wp_enqueue_style( 'slick-slider-custom-styles' );
        wp_enqueue_script( 'slick-slider-scripts' );
        wp_enqueue_script( 'hayfo-slider-scripts' );

        wp_localize_script( 'hayfo-slider-scripts', 'frames', array(
            'value' => $this->shortcode->getFrames(),
        ));
    }
}
