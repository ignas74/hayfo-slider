<?php

namespace HayfoSlider;

use Admin;
use Shortcode;
use Enqueue;

class Init {
    public static function initialize() {
        $admin = new Admin();
        $admin->register();
        
        $shortcode = new Shortcode();
        $shortcode->register();
        
        $enqueue = new Enqueue(); 
        $enqueue->setShortcode( $shortcode );
        $enqueue->register();
    }
}
