<?php

namespace HayfoSlider;

use Admin\Admin;
use Enqueue\EnqueueScripts;
use Frontend\Frontend;
use Query\Queries;

class Init {
    public static function initialize() {
        $admin = new Admin();
        $admin->register();

        $enqueue = new EnqueueScripts();
        $enqueue->register();

        $frontend = new Frontend();
        $frontend->register();

        // new Queries();
    }
}
