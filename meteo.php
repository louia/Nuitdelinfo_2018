<?php

require_once "autoload.inc.php";

$p=new WebPage("test",null,"img/favicon.png");
$p->appendCssUrl("css/style1.css");
$p->appendCssUrl("css/style.css");
$p->appendCssUrl("css/icon_weather.css");

$p->appendContent(<<<HTML
<br><br><br><br><br>
<div class="container">
    

      <div class="row">
        <div class="col-sm-4">

          <div class="compass">
            <div class="direction">
              <p><i id="dir">NE</i><span id="directionn"> 10 mph</span></p>
            </div>
            <div id="fleche" class="arrow ne"></div>
          </div>

        </div>
        <div class="col-sm-4">
          <p class="text-center" id="meteoactu">Météo actuelle : </p>
          <p class="text-center">
          <div class="icon sun-shower">
            <div class="cloud"></div>
            <div class="sun">
              <div class="rays"></div>
            </div>
            <div class="rain"></div>
          </div>

          <div class="icon thunder-storm">
            <div class="cloud"></div>
            <div class="lightning">
              <div class="bolt"></div>
              <div class="bolt"></div>
            </div>
          </div>

          <div class="icon cloudy">
            <div class="cloud"></div>
            <div class="cloud"></div>
          </div>

          <div class="icon flurries">
            <div class="cloud"></div>
            <div class="snow">
              <div class="flake"></div>
              <div class="flake"></div>
            </div>
          </div>

          <div class="icon sunny">
            <div class="sun">
              <div class="rays"></div>
            </div>
          </div>

          <div class="icon rainy">
            <div class="cloud"></div>
            <div class="rain"></div>
          </div>
        </div>
        </p>
    <div class="col-sm-4"></div>
</div>
</div>


HTML
);



echo $p->toHTML();