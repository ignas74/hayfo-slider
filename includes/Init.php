<?php

namespace HayfoSlider;

use Admin\Admin;
use Enqueue\Enqueue;
use Display;
use Shortcode;
// use Query\Queries;

class Init {
    public static function initialize() {
        $admin = new Admin();
        $admin->register();
        
        $shortcode = new Shortcode(); // default frames value 
        $shortcode->register();
        
        $enqueue = new Enqueue(); // default frames value 
        $enqueue->setShortcode( $shortcode );
        $enqueue->register();

        // new Display();
    }
}
