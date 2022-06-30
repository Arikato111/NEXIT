<?php
// if other page is function 
// this function will working to get page function as $PF and show inside
return function ($PF) {
  // global title to make support title function from wisit-router
    $GLOBALS['title'] = 'title';
    $content = $PF(); // working before put content

    return <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>{$GLOBALS['title']}</title>
    </head>
    <body>
      {$content}
    </body>
    </html>
    HTML;
};
?>
