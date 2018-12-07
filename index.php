<?php

require_once ("autoload.inc.php");

$p=new WebPage("Nuit de l'info", "str","str");

$p->appendContent("coucou");

echo $p->toHTML();
var_dump($p);
//echo $p->toHTML();
