<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class ActiveRoute
{
    public static function isActiveRoute($route, $output = "active")
    {
        if (Route::currentRouteName() == $route) {
            return $output;
        }
    }

    public static function areActiveRoutes(Array $routes, $output = "active")
    {
        if (in_array(Route::currentRouteName(), $routes)) {
            return $output;
        }
    }
}
//function isActiveRoute($route, $output = "active")
//{
//    if (Route::currentRouteName() == $route) {
//        return $output;
//    }
//}
//
//function areActiveRoutes(Array $routes, $output = "active")
//{
//    if (in_array(Route::currentRouteName(), $routes)) {
//        return $output;
//    }
//}
