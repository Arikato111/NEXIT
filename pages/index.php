<?php
$title = import('nexit/title');

$Home = function () use ($title) {
  $title('Nexit app'); // use title function to change title
  return <<<HTML
    <div class="content bg-violet">
      <div class="text-white">
        <div class="box">
          <div class="triangle"></div>
          <div class="triangle t-1"></div>
          <div class="triangle t-2"></div>
          <div class="triangle t-3"></div>
          <div class="triangle t-4"></div>
          <div class="triangle t-5"></div>
          <div class="triangle t-6"></div>
        </div>
        <h1 align="center">Welcome to NEXIT 2.1</h1>
        <h2>Get started by editing pages/index.php</h2>
        <h3 align="center">
          Read more at 
          <a class="a-link" target="_blank" href="https://github.com/Arikato111/NEXIT">Github</a>
        </h3>
      </div>
    </div>
    HTML;
};

$export = $Home;
