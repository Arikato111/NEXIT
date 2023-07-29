<?php
return function ($path = 'api')
{
    $getPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $params = explode('/', substr($getPath, 1));
    // print_r($params[0] === $path);
    return  isset($params[0]) && $params[0] == $path;
};
