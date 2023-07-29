<?php
$useApi = import('nexit/useApi');
$export = function ($Component) use ($useApi) {
  if ($useApi()) return $Component(); // for api

  $GLOBALS['title'] = 'title';
  $styles = showStyles();
  $content = $Component();

  return <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="/public/logo.svg" type="image/svg" sizes="16x16">
      <title>{$GLOBALS['title']}</title>
      {$styles} 
      <link rel="stylesheet" href="/styles/style.css">
    </head>
    <body>
      {$content}
    <script src="/styles/script.js"></script>
    </body>
    </html>
    HTML;
};
