<?php

if (!function_exists('set_active')) {
    /**
     * Set the active class on a nav link based on the current URL.
     *
     * @param string $path
     * @param string $activeClass
     * @return string
     */
    function set_active($path, $activeClass = 'active')
    {
        return request()->fullUrlIs($path . '*') ? $activeClass : '';
    }
}
