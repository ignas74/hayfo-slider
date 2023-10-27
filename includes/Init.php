<?php

namespace HayfoSlider;

use Admin\Admin;
use Enqueue\EnqueueScripts;
use Frontend\Frontend;
// use Query\Queries;

class Init {
    public static function initialize() {
        $admin = new Admin();
        $admin->register();

        $enqueue = new EnqueueScripts( "4" );
        $enqueue->register();

        $frontend = new Frontend( "4" );
        $frontend->register();

        // new Queries();
    }
}
