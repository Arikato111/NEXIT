<?php
// if other page is function 
// this function will working to get page function as $PF as show inside
return function ($PF) {
    return <<<HTML
      {$PF()}
    HTML;
};
?>