<?php

require_once "autoload.inc.php";

$p=new WebPage("test",null,"img/favicon.png");
$p->appendCssUrl("css/style1.css");
$p->appendCssUrl("css/style.css");
$p->appendCssUrl("css/icon_weather.css");
$p->appendsJs(<<<JS
mapboxgl.accessToken = 'pk.eyJ1IjoiYXhlbG9vIiwiYSI6ImNqcGRhbnd3bDMwam0zd3B4dTFkbnh4Y2EifQ.kDNephGakx_8FbnG3MPtTg';
const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/axeloo/cjpdb4p030b8o2rmnho1mmbet',
  center: [16.509,-23.249],
  zoom: (6.13),
  bearing : 25.11,
  pitch : 60.0

});
JS
);


$p->appendContent(<<<HTML
<br><br><br><br><br>
<div class="container">

  <div id='map'></div>
HTML
);



echo $p->toHTML();
