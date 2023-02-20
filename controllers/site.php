<?php

use Microman\Stylewriter;

return function ($sw_render) {

    //For Debug:
    //$sw_render = true;

    return [
        'cw' => new Stylewriter(isset($sw_render))
    ];
};
