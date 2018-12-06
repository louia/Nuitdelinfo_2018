<?php
    require_once 'autoload.inc.php';

    $page = new WebPage("TestPage");
    $page->appendJsUrl("js\weather_requests.js");
    echo $page->toHTML();
    
?>