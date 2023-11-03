<?php

/*
 * Plugin Name:       Hayfo Slider
 * Plugin URI:        http://www.ignas.click
 * Description:       Slider USING THIS ONE
*/

/**
 * @TODO 
 * fe console errors
 * more than 2 shortcodes
 * Enqueue - register styles?
 * more Query
 * Shortcode move $title html
 * if ( is_plugin_active( 'woocommerce/woocommerce.php' ) path?
 * uninstall.php, activate, deactivate plugin
 */

if ( ! defined( 'ABSPATH' )) die;

require_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // is_plugin_active()

add_action( 'init', 'hayfo_slider_init' );

function hayfo_slider_init() {
    if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {  // Probably wrong dir as I have woocommerce core inside the plugin
        require_once plugin_dir_path( __FILE__ ) . 'includes/Init.php';
        require_once plugin_dir_path( __FILE__ ) . 'includes/Admin.php';
        require_once plugin_dir_path( __FILE__ ) . 'includes/Enqueue.php'; 
        require_once plugin_dir_path( __FILE__ ) . 'includes/Query.php'; 
        require_once plugin_dir_path( __FILE__ ) . 'includes/Shortcode.php'; 
        require_once plugin_dir_path( __FILE__ ) . 'includes/Product.php';
        HayfoSlider\Init::initialize();
    }
    else {
        add_action( 'admin_notices', 'hayfo_slider_woocommerce_inactive_notice' );
    }
}

function hayfo_slider_woocommerce_inactive_notice() {
    ?>
        <div class="notice notice-error is-dismissible">
            <p><?php _e('Hayfo Slider requires WooCommerce to be installed and active.', 'hayfo-slider'); ?></p>
        </div>
    <?php
}
