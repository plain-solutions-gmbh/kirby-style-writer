<?php

load([
    'Microman\\Stylewriter' => '/lib/StyleWriter.php',
], __DIR__);

use Microman\Stylewriter;

Kirby::plugin('microman/stylewriter', [
	
	'hooks' => [
		'page.update:after' => function ($newPage, $oldPage) {
		
			$render = $newPage->render(['sw_render' => true]);


        },
		'site.update:after' => function ($newSite, $oldSite) {

			$newSite->homepage()->update();

		},
	],
	'controllers' => [
        'site' => require 'controllers/site.php'
    ]

]);


