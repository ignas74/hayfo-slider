<?php

namespace Enqueue;

use Shortcode;

class Enqueue {
    private $shortcode;

    public function setShortcode( Shortcode $shortcode ) {
        $this->shortcode = $shortcode;
    }

    function register() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
    }

    function enqueue() {
        wp_enqueue_style( 'hayfo-slider-styles', dirname( plugin_dir_url( __FILE__ ) ) . '/assets/slider-styles.css' );
        wp_enqueue_script( 'hayfo-slider-scripts', dirname( plugin_dir_url( __FILE__ ) ) . '/assets/slider-script.js' );

        wp_localize_script( 'hayfo-slider-scripts', 'frames', array(
            'value' => $this->shortcode->getFrames(),
        ));
    }
}
