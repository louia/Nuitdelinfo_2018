<?php

require_once "autoload.inc.php";

$p=new WebPage("test",null,"img/favicon.png");
$p->appendCssUrl("css/style1.css");
$p->appendCssUrl("css/style.css");
$p->appendCssUrl("css/icon_weather.css");
$p->appendCssUrl("https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css");
$p->appendJsUrl("https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.js");
$p->appendCss(  "#map { position:absolute; top:0; bottom:0; width:100%; } #row{height: 500px;}");

$p->appendContent(<<<HTML
<br><br><br><br><br>
<div class="container">
  <div class="row" id="row">
    <div class="col-sm-12">
      <div id='map'></div>
    </div>
  </div>
</div>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiYXhlbG9vIiwiYSI6ImNqcGRhbnd3bDMwam0zd3B4dTFkbnh4Y2EifQ.kDNephGakx_8FbnG3MPtTg';
const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/axeloo/cjpdb4p030b8o2rmnho1mmbet',
  center: [16.509,-23.249],
  zoom: (6.13),
  bearing : 25.11,
  pitch : 60.0

});
</script>
HTML
);



echo $p->toHTML();
