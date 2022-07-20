<?php
$title = import('wisit-router/title');

$Home = function () use ($title) {
  $title('Home'); // use title function to change title
  return <<<HTML
    <div class="content">
      <!-- Style link  -->
      <link rel="stylesheet" href="/styles/style.css">

      <!-- Content  -->
      <div>
        <div class="box">
          <div class="triangle"></div>
        </div>
        <h1 align="center">Welcome to NEXIT 2.0</h1>
        <h2 align="center">
          Read more at 
          <a target="_blank" href="https://github.com/Arikato111/NEXIT">Github</a>
        </h2>
      </div>
    </div>
    HTML;
};

$export = $Home;