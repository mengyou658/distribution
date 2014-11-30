<?php

/*
|--------------------------------------------------------------------------
| Helpers
|--------------------------------------------------------------------------
|
|
*/

if ( ! function_exists('nl2p')) {
    function nl2p($string) {
        $paragraphs = '';

        foreach (explode("\n", $string) as $line) {
            if (trim($line)) {
                $paragraphs .= '<p>' . $line . '</p>';
            }
        }

        return $paragraphs;
    }
}

if ( ! function_exists('cur_domain')) {
    function cur_domain() {
        return $_SERVER['SERVER_NAME'];
    }
}