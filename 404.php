<?php

require_once ("autoload.inc.php");

$p=new WebPage("Nuit de l'info", "#FFFFF","img//favicon_trans.png");
$p->appendCssUrl("./css/style.css");
$p->appendContent("<canvas class='fireworks'></canvas>");

$p->appendCss(<<<CSS
body{
    height : 100%;
    width: 100vh;
    height: none !important;
    transform-origin: 0 0;
    background: url('./img/404.gif') center;
    background-size:cover;
    background-repeat:no-repeat;
    background-attachment:fixed;

}
html {

    height: 100%;
  }
  canvas{
    position: fixed;
  }



CSS
);
$p->appendContent(<<<HTML

  <script src='js/ymlarg.js'></script>
  <script src='js/index_fire.js'></script>
HTML
);


echo $p->toHTML();
