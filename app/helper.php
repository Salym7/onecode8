<?php

use Illuminate\Support\Facades\Route as Route;

if (!function_exists('test')) {
    function test()
    {
        return app('test');
    }
}

if (!function_exists('active_link')) {
    function active_link(string $name, string $class = 'active'): string
    {
        return Route::is($name) ? $class : '';
    }
}
function hello()
{
    return 'hello';
}

if (!function_exists('alert')) {
    function alert($text)
    {
        session(['alert' => __($text)]);
    }
}
