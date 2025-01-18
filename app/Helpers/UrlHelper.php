<?php

if (!function_exists('base_url')) {
    function base_url($path = 'http://localhost/codebridge/') {
        return url($path);
    }
}
