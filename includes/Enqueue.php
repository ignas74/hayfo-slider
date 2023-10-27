<?php

namespace Enqueue;

use Frontend\Frontend;

class EnqueueScripts {
    private $frames_number;

    public function __construct( $frames_number ) {
        $this->frames_number = $frames_number;
    }

    function register() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
    }
    
    function enqueue() {
        wp_enqueue_style( 'hayfo-slider-styles', dirname( plugin_dir_url( __FILE__ ) ) . '/assets/slider-styles.css' ); 
        wp_enqueue_script( 'hayfo-slider-scripts', dirname( plugin_dir_url( __FILE__ ) ) . '/assets/slider-script.js' );

        wp_localize_script( 'hayfo-slider-scripts', 'frames', array(
            'value' => $this->frames_number,
        ) );

        // echo '<pre>';
        // var_dump( $this->frames_number );
        // echo '</pre>';

    }
}
