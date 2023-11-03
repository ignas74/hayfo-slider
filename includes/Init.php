<?php

namespace HayfoSlider;

use Admin;
use Shortcode;
use Enqueue;
use Product;
use Query;

class Init {
    public static function initialize() {
        $admin = new Admin();
        $admin->register();
        $product_display = new Product();
        $query = new Query();
        $shortcode = new Shortcode( $query, $product_display );
        $shortcode->register();
        $enqueue = new Enqueue( $shortcode ); 
        $enqueue->register();
    }
}
