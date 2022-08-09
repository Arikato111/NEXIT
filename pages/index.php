<?php
$title = import('nexit/title');

$Home = function () use ($title) {
  $title('Nexit app'); // use title function to change title
  return <<<HTML
    <div class="content">
      <!-- Style link  -->
      <link rel="stylesheet" href="/styles/style.css">

      <!-- Content  -->
      <div>
        <div class="box">
          <div class="triangle"></div>
          <div class="triangle reverse"></div>
        </div>
        <h1 align="center">Welcome to NEXIT 2.0</h1>
        <h2>Get started by editing pages/index.php</h2>
        <h3 align="center">
          Read more at 
          <a target="_blank" href="https://github.com/Arikato111/NEXIT">Github</a>
        </h3>
      </div>
    </div>
    HTML;
};

$export = $Home;