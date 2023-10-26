<?php

/*
 * Plugin Name:       Hayfo Slider
 * Plugin URI:        http://www.ignas.click
 * Description:       Slider USING THIS ONE
*/

if (!defined('ABSPATH')) { die; }
require_once plugin_dir_path( __FILE__ ) . 'includes/Init.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/Admin.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/Enqueue.php'; 
require_once plugin_dir_path( __FILE__ ) . 'includes/Query.php'; 
HayfoSlider\Init::initialize();
