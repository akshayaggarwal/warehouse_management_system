<?php
    define('IS_DEVELOPMENT', true);

    if (IS_DEVELOPMENT) {
        ini_set('display_errors', 1);
        error_reporting(E_ALL & ~E_NOTICE);
    } else {
        ini_set('display_errors', 0);
        error_reporting(0);
    }

    function exception_handler($exception) {
        if (IS_DEVELOPMENT) {
            var_dump($exception);
        } else {
            // rip 
        }
    }
?>