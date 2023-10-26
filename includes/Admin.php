<?php

/**
 * @see https://developer.wordpress.org/plugins/settings/custom-settings-page/
 */

namespace Admin;

class Admin {
    function register() {
        add_action( 'admin_menu', array( $this, 'add_admin_page' ) );
        add_action( 'admin_init', array( $this, 'hayfo_slider_settings_init' ) );
        add_filter( 'plugin_action_links_' . dirname( dirname( plugin_basename(__FILE__) ) ) . '/hayfo-slider.php', array( $this, 'plugin_link_to_admin_page' ) );
    }

   function plugin_link_to_admin_page( $links_array ) {
        $link[] = '<a href="' . admin_url( 'admin.php?page=hayfo_slider_settings_page' ) . '">Settings</a>';
        return array_merge( $links_array, $link );
    }

    function add_admin_page() {
        add_menu_page(
            'HayfoSlider',
            'Hayfo Slider',
            'manage_options',
            'hayfo_slider_settings_page', // Slug
            array( $this, 'admin_index' ),
            '',
            100
        );
    }

    function hayfo_slider_settings_init() {
        add_settings_section(
            'hayfo_slider_carousel_frame_settings_section',
            '', // Title
            '', // Callback (no callback function for this section)
            'hayfo_slider_settings_page' // Slug
        );
    
        register_setting(
            'hayfo_slider_settings_page', // Option group
            'hayfo_slider_select_field', // Option name. Field ID
            array(
                'type' => 'integer', // Data type
                'sanitize_callback' => 'absint', // Sanitization function
                'default' => 4 // Default value
            )
        );
    
        add_settings_field(
            'hayfo_slider_select_field', // Field ID
            'Pictures width in carousel:', // Field title
            array( $this, 'carousel_frame_settings_html' ), // Callback function to display the field
            'hayfo_slider_settings_page', // Page. Option group
            'hayfo_slider_carousel_frame_settings_section' // Section
        );
    }

    function admin_index() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    
            <form action="options.php" method="POST">
                <?php
                    settings_fields( 'hayfo_slider_settings_page' );
                    do_settings_sections( 'hayfo_slider_settings_page' );
                    submit_button( __('Save Settings', '' ));
                ?>
            </form>
        </div>
        <?php
    }
    
    function carousel_frame_settings_html() {
        $select_field_value = get_option( 'hayfo_slider_select_field' );
        ?>
            <div class="wrap">
                <select name="hayfo_slider_select_field" class="regular-text">
                    <option value="4" <?php selected( '4', $select_field_value ); ?>>Default - 4</option>
                    <option value="1" <?php selected( '1', $select_field_value ); ?>>One</option>
                    <option value="2" <?php selected( '2', $select_field_value ); ?>>Two</option>
                    <option value="3" <?php selected( '3', $select_field_value ); ?>>Three</option>
                    <option value="4" <?php selected( '4', $select_field_value ); ?>>Four</option>
                </select>
    
                <div>
                    <span>Current value:</span>
                    <span><?php echo( $select_field_value ); ?></span>
                </div>
            </div>
        <?php
    }

}

