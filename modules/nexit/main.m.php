<?php
/*  * Copyright (c) 2022 ณวสันต์ วิศิษฏ์ศิงขร
    *
    * This source code is licensed under the MIT license found in the
    * LICENSE file in the root directory of this source tree.
*/
return function () {
    // func for get path from url
    $getPath = function () {
        $link = "$_SERVER[REQUEST_URI]";
        $path = "/";
        $str_len = strlen($link);
        for ($i = 1; $i < $str_len; $i++) {
            if ($link[$i] == '?') {
                break;
            } else {
                $path = $path . $link[$i];
            }
        }
        return $path;
    };
    $path = $getPath();
    $path_ex = explode('/', $path);
    $len = sizeof($path_ex);
    $pages = './pages';
    for ($i = 1; $i < $len; $i++) {
        // check is index ?
        if ($path_ex[$i] == '') {
            $pages .= '/index';
        } elseif (file_exists($pages . '/' . $path_ex[$i]) || file_exists($pages . '/' . $path_ex[$i] . '.php')) {
            $pages .= '/' . $path_ex[$i];
        } else {
            $pages .= '/[]';
        }
    }
    $pages .= '.php';
    if (file_exists($pages) && strpos($pages, '_') == false) {
        $PageFunc = require($pages);
        // check type of $PageFunc | if it is html code
        if (gettype($PageFunc) == 'integer') exit;

        if (file_exists('./pages/_app.php')) {
            $_app = require('./pages/_app.php');
            echo $_app($PageFunc);
            exit;
        } else {
            echo $PageFunc();
            exit;
        }
    } else {
        if (file_exists('./pages/_notfound.php')) {
            $notfound = require('./pages/_notfound.php');
            if (gettype($notfound) == 'integer') exit;

            if (file_exists('./pages/_app.php')) {
                $_app = require('./pages/_app.php');
                echo $_app($notfound);
                exit;
            } else {
                echo $PageFunc();
                exit;
            }
        } else {
            echo 'NOT FOUND THIS PAGE !';
            exit;
        }
    }
    // funcFF
};
