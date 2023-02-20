<?php

use Microman\Stylewriter;

return function ($cw_render) {

    //For Debug:
    //$cw_render = true;

    return [
        'cw' => new Stylewriter(isset($cw_render))
    ];
};
