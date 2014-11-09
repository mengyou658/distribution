<?php

/*
|--------------------------------------------------------------------------
| IoCs
|--------------------------------------------------------------------------
|
|
*/

App::singleton('parsedown', function() {
    return Parsedown::instance()->setMarkupEscaped(true);
});
