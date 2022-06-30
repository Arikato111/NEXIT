<?php return function () {
    return <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nexit</title>
        <link rel="stylesheet" href="/static/style.css">
    </head>
    
    <body>
      <div class="content">
        <div class="box">
          <div class="title">Welcome to Nexit App </div>
          <hr>
          <div class="subtitle">Writing website as Multi or Single </div>
          <div class="box-list">
            <ul class="list">
              <li>write as function</li>
              <li>write as Normal HTML</li>
            </ul>
          </div>
          <div class="subtitle">This site write as function</div>
          <div>You can go to <a href="/normal">html</a> it's write as normal HTML</div>
            <div>You can use module function to require module by input the only name's module, it has return module</div>
              <div style="font-size: 18px;">You will find style.css and script.js in static folder.</div>
                <h4 class="contact">Read more at <a class="hove" target="_blank" href="https://github.com/Arikato111/NEXIT">Github</a></h4>
              </div>
            </div>
          </body>
    </html>
    HTML;
};
