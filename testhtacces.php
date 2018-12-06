<?php

require_once ("autoload.inc.php");

$p=new WebPage("Nuit de l'info", "#FFFFF","str");
$p->appendCssUrl("./css/style.css");
$p->appendCss("body{
    width: 100vh;
    height:100vw;
    transform-origin: 0 0;
    background: url('https://media.giphy.com/media/11clOWGCHzWG7C/giphy.gif') center;
    background-size:cover;

}");

echo $p->toHTML();