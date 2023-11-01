<?php

namespace HayfoSlider;

use Admin;
use Shortcode;
use Enqueue;

class Init {
    public static function initialize() {
        $admin = new Admin();
        $admin->register();
        
        $shortcode = new Shortcode(); // default frames value 
        $shortcode->register();
        
        $enqueue = new Enqueue(); // default frames value 
        $enqueue->setShortcode( $shortcode );
        $enqueue->register();
    }
}
