<?php
// if you want ot use api
// use `wisit-express` library on https://github.com/Arikato111/wisit-express.git
// install with command `php control install wisit-express`

$export = function () {
    return json_encode([
        'message' => 'hello api !'
    ]);
};
