<?php
$title = '智能后台管理';
function tpl_require($filename)
{
    global $title;
    global $base;
    global $path;

    try {
        if (! @include_once($filename.'.php')) {
            throw new Exception($filename.'.php does not exist');
        }
    } catch (Exception $e) {
        // echo $filename.' does not exist';
        showCode(404);
    }
}

function head()
{
    tpl_require('header');
}

function foot()
{
    tpl_require('footer');
}

function sidebar()
{
    tpl_require('sidebar');
}

function showCode($e)
{
    $e = (int)$e;
    $script = array(404 => ' 404 Not Found',500 =>' 500 Internal Server Error',403 => ' 403 Forbidden');
    header($_SERVER["SERVER_PROTOCOL"].$script[$e != 403 ? ($e<500?404:500):403], true, $e);
    tpl_require($e);
}
