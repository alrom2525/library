<?php

if (!function_exists('getActiveMenu')) {
    function getActiveMenu($path)
    {
        if (request()->is($path) || request()->is($path . '/*')) {
            return 'active';
        } else {
            return '';
        }
    }
}