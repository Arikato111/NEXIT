<?php
$export = function ($Component) {
    $GLOBALS['title'] = 'title';
    $content = $Component();

    return <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="/public/logo.png" type="image/x-icon">
      <title>{$GLOBALS['title']}</title>
    </head>
    <body>
      {$content}
    </body>
    </html>
    HTML;
};
?>
