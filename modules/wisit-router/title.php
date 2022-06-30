<?php
return function ($title) {
    if(isset($GLOBALS['title'])) {
        $GLOBALS['title'] = $title;
    } else {
        echo '<script>alert("title not support")</script>';
    }
};