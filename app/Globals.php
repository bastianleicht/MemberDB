<?php

if (!function_exists('dd')) {
    function dd()
    {
        array_map(function($x) {
            dump($x);
        }, func_get_args());
        die;
    }
}

function format_number($number){
    return floor($number * 100) / 100;
}