<?php

namespace Enqueue;

class EnqueueScripts {
    function register() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
    }

    function enqueue() {
        wp_enqueue_style( 'hayfo-slider-styles', dirname( plugin_dir_url( __FILE__ ) ) . '/assets/slider-styles.css' ); 
        wp_enqueue_script( 'hayfo-slider-scripts', dirname( plugin_dir_url( __FILE__ ) ) . '/assets/slider-script.js' );

        // $value = new Queries();
        // $value->create_shortcode_for_latest_products();

        // wp_localize_script( 'hayfo-slider-scripts', 'frames', array(
        //     'value' => $atts['id'],
        // ) );
    }

}
