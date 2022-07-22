<?php return function () { 
  // function dont need head tag or body tag 
  // except has no _app.php inside pages
  $title = require('./modules/wisit-router/title.php');
  $title('Home');
  return <<<HTML
    <link rel="stylesheet" href="/static/style.css">

      <div class="content">
        <div class="box">
          <div class="title">
            Welcome to 
            <span style="margin: 0 20px;">
              <img class="logo" src="/public/logo.png" alt=""><span class="xt">xit</span>
            </span>
             ( 1.0 ) 
          </div>
          <hr>
          <div class="subtitle">Writing website as Multi or Single </div>
          <div class="box-list">
            <ul class="list">
              <li>write as function</li>
              <li>write as Normal HTML</li>
            </ul>
          </div>
          <div class="subtitle">This site write as function</div>
          <div>You can go to <a href="/normal"><button class="btn-g">HTML</button></a> it's write as normal HTML</div>
            <div>You can use module function to require module by input the only name's module, it has return module</div>
            <div style="font-size: 18px;">You will find style.css and script.js in static folder.</div>
            <h4 class="contact">Read more at <a class="hove" target="_blank" href="https://github.com/Arikato111/NEXIT">Github</a></h4>
          </div>
        </div>
    HTML;
};
