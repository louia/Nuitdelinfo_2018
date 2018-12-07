<?php

require_once ("autoload.inc.php");

$p=new WebPage("Nuit de l'info", "#FFFFF","str");
$p->appendCssUrl("./css/style.css");
$p->appendCss("body{
    height : 100%;
    width: 100vh;
    height:100vw;
    transform-origin: 0 0;
    background: url('./img/404.gif') center;
    background-size:cover;
    background-repeat:no-repeat;
    background-attachment:fixed;

}
html {

    height: 100%;
  }

");

echo $p->toHTML();
