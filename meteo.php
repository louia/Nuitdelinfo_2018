<?php

require_once "autoload.inc.php";

$p=new WebPage("test",null,"img/favicon.png");
$p->appendCssUrl("css/style1.css");
$p->appendCssUrl("css/style.css");
$p->appendCssUrl("css/icon_weather.css");
$p->appendJsUrl("js/compass.js");
$p->appendJsUrl("js/AjaxRequest.js");


$p->appendContent(<<<HTML
<br><br><br><br><br>
<div class="container">
    

      <div class="row">
        <div class="col-sm-4">

          <div class="compass">
            <div class="direction">
              <p><i id="dir"></i><span id="directionn"></span></p>
            </div>
            <div id="fleche" class="arrow ne"></div>
          </div>

        </div>
        <div class="col-sm-4">
          <p class="text-center" id="meteoactu">Météo actuelle : </p>
          <p class="text-center" id="sous-titre"> Température : <span id="temp"></span></p>
          <p class="text-center" id="sous-titre">Humidité : <span id="hum"></span></p>

          <p class="text-center">
          <div class="icon sun-shower">
            <div class="cloud"></div>
            <div class="sun">
              <div class="rays"></div>
            </div>
            <div class="rain"></div>
          </div>

          <div class="icon thunder-storm" id="orage">
            <div class="cloud"></div>
            <div class="lightning">
              <div class="bolt"></div>
              <div class="bolt"></div>
            </div>
          </div>

          <div class="icon cloudy" id="cloud">
            <div class="cloud"></div>
            <div class="cloud"></div>
          </div>

          <div class="icon flurries" id="snow">
            <div class="cloud"></div>
            <div class="snow">
              <div class="flake"></div>
              <div class="flake"></div>
            </div>
          </div>

          <div class="icon sunny"  id="sun">
            <div class="sun">
              <div class="rays"></div>
            </div>
          </div>

          <div class="icon rainy" id="pluie">
            <div class="cloud"></div>
            <div class="rain"></div>
          </div>
        </div>
        </p>
    <div class="col-sm-4">
    <p class="text-center" id="meteoactu">Météo J+2 : </p>
    <p class="text-center" id="sous-titre"> Date : <span id="date"></span></p>
    <p class="text-center" id="sous-titre"> Température : <span id="tempj2"></span></p>
    <p class="text-center" id="sous-titre">Humidité : <span id="humj2"></span></p>
    <p class="text-center">
          <div class="icon sun-shower">
            <div class="cloud"></div>
            <div class="sun">
              <div class="rays"></div>
            </div>
            <div class="rain"></div>
          </div>

          <div class="icon thunder-storm" id="orage2">
            <div class="cloud"></div>
            <div class="lightning">
              <div class="bolt"></div>
              <div class="bolt"></div>
            </div>
          </div>

          <div class="icon cloudy" id="cloud2">
            <div class="cloud"></div>
            <div class="cloud"></div>
          </div>

          <div class="icon flurries" id="snow2">
            <div class="cloud"></div>
            <div class="snow">
              <div class="flake"></div>
              <div class="flake"></div>
            </div>
          </div>

          <div class="icon sunny"  id="sun2">
            <div class="sun">
              <div class="rays"></div>
            </div>
          </div>

          <div class="icon rainy" id="pluie2">
            <div class="cloud"></div>
            <div class="rain"></div>
          </div>
        </div>
        </p>
    </div>
</div>
</div>


HTML
);



echo $p->toHTML();