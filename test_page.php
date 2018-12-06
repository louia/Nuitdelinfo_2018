<?php
    require_once 'autoload.inc.php';

    $page = new WebPage("TestPage");
    $page->appendContent("<h1>Coucou</h1><h2>coucou</h2>");
    $page->appendJsUrl("js\AjaxRequest.js");
    $page->appendJsUrl("js\weather_requests.js");
    
    echo $page->toHTML();

?>