<?php

namespace HayfoSlider;

use Admin\Admin;
use Enqueue\EnqueueScripts;

class Init {
    public static function initialize() {
        $admin = new Admin();
        $admin->register();

        $enqueue = new EnqueueScripts();
        $enqueue->register();
    }
}
