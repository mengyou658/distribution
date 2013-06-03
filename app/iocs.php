<?php

/*
|--------------------------------------------------------------------------
| IoC Container
|--------------------------------------------------------------------------
|
| Bindin Into The Container
*/

use \Michelf\Markdown;

App::singleton('markdown', function()
{
    $markdown = new Markdown;
    $markdown->no_markup = true;
    $markdown->no_entities = true;
    return $markdown;
});