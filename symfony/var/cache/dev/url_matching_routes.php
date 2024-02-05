<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/check' => [[['_route' => 'app_check', '_controller' => 'App\\Controller\\CheckController::index'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'default-controller', '_controller' => 'App\\Controller\\DefaultController::index'], null, null, null, false, false, null]],
        '/hello' => [[['_route' => 'app_hello', '_controller' => 'App\\Controller\\HelloController::index'], null, null, null, false, false, null]],
        '/hello/controoler' => [[['_route' => 'app_hello_controoler', '_controller' => 'App\\Controller\\HelloControolerController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
