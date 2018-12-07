<?php

require_once ("autoload.inc.php");

$p=new WebPage("Nuit de l'info", "#FFFFF","str");
$p->appendCssUrl("css/style1.css");
$p->appendCssUrl("css/style.css");
$p->appendCssUrl("css/icon_weather.css");
$p->appendJsUrl("js/compass.js");
$p->appendJsUrl("js/AjaxRequest.js");
$p->appendCssUrl("https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css");
$p->appendJsUrl("https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.js");
$p->appendCss(  "#map { position:absolute; top:0; bottom:0; width:100%; } #row{height: 800px;}");
$p->appendToHead(<<<HTML
  <link href='calendar/fullcalendar.css' rel='stylesheet' />
  <link href='calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
  <script src='calendar/lib/moment.min.js'></script>
  <script src='calendar/lib/jquery.min.js'></script>
  <script src='calendar/fullcalendar.js'></script>
  <script src='calendar/locale-all.js'></script>
  <script src='calendar/demos/js/theme-chooser.js'></script>
HTML
);

$p->appendContent(<<<HTML

<nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"><img src="./img/favicon.png" alt="Fav Icon"> <span class="sr-only">(current)</a>

    
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link"  href="#">La nuit de l'info  <i class="em em-night_with_stars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="faq.php">F.A.Q</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Testez-moi !" aria-label="Search">
      <a href="404.php" class="btn btn-outline-success my-2 my-sm-0" ><i class="fas fa-search"></i></a>

     
    </form>
  </div>
</nav>
HTML
);
$p->appendContent(<<<HTML
<br>
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
$p->appendContent(<<<HTML
<br>
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

$p->appendContent(<<<HTML
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
    <div id='calendar'></div>
<form name='addEvent' action="addEvent.php" method='POST'>
  <div class="container">

    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Titre de l'événement</span>
      </div>
      <input type="text" class="form-control" name="title" id="title" required>
    </div>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Date de début</span>
      </div>
      <input type="text" class="form-control" name="beginDay" id="beginDay" placeholder="DD" pattern="[0-9]{2}" required>-
      <input type="text" class="form-control" name="beginMonth" id="beginMonth" placeholder="MM" pattern="[0-9]{2}" required">-
      <input type="text" class="form-control" name="beginYear" id="beginYear" placeholder="YYYY" pattern="[0-9]{4}" required">
      <br>
      <div class="input-group-prepend">
        <label class="input-group-text">Heure de début</label>
      </div>
      <select class="custom-select" id="beginHour" name="beginHour">
        <option value="" selected>HH</option>
      </select>
      <select class="custom-select" id="beginMinute" name="beginMinute">
        <option value="" selected>MM</option>
      </select>
    </div>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Date de fin &nbsp;&nbsp;&nbsp;&nbsp;</span>
      </div>
      <input type="text" class="form-control" name="endDay" id="endDay" placeholder="DD" pattern="[0-9]{2}">-
      <input type="text" class="form-control" name="endMonth" id="endMonth" placeholder="MM" pattern="[0-9]{2}">-
      <input type="text" class="form-control" name="endYear" id="endYear" placeholder="YYYY" pattern="[0-9]{4}">
      <br>
      <div class="input-group-prepend">
        <label class="input-group-text">Heure de fin &nbsp;&nbsp;&nbsp;&nbsp;</label>
      </div>
      <select class="custom-select" id="endHour" name="endHour">
        <option value="" selected>HH</option>
      </select>
      <select class="custom-select" id="endMinute" name="endMinute">
        <option value="" selected>MM</option>
      </select>
    </div>
    <button type="submit" class="btn">Ajouter événement</button>

  </div>
</form>

    </div>
  </div>

</div>
HTML
);
$p->appendJs(<<<JS


  $(document).ready(function() {

    function appendMinutes() {
      for(var i = 0; i < 60; i++) {
        if(i < 10) {
          document.getElementById('beginMinute').add(new Option("0" + i, "0" + i));
          document.getElementById('endMinute').add(new Option("0" + i, "0" + i));
        }
        else {
          document.getElementById('beginMinute').add(new Option(i, i));
          document.getElementById('endMinute').add(new Option(i, i));
        }
      }
    }

    function appendHours() {
      for(var i = 1; i < 25; i++) {
        if(i < 10) {
          document.getElementById('beginHour').add(new Option("0" + i, "0" + i));
          document.getElementById('endHour').add(new Option("0" + i, "0" + i));
        }
        else {
          document.getElementById('beginHour').add(new Option(i, i));
          document.getElementById('endHour').add(new Option(i, i));
        }
      }
    }
    appendMinutes();
    appendHours();

    initThemeChooser({

      init: function(themeSystem) {
        $('#calendar').fullCalendar({
          locale: 'fr',
          timezone: 'UTC',
          themeSystem: 'bootstrap4',
          header: {
            left: 'prev,next',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
          },
          weekNumbers: true,
          navLinks: true, // can click day/week names to navigate views
          editable: true,
          eventLimit: true, // allow "more" link when too many events
          events:
          // your event source
          {
            url: 'calendar/calendar.json',
            type: 'POST',
            error: function() {
              alert('there was an error while fetching events!');
            },
            color: '#f5f5dc',   // a non-ajax option
            textColor: 'white' // a non-ajax option
          }
        });
      },
      change: function(themeSystem) {
        $('#calendar').fullCalendar('option', 'themeSystem', themeSystem);
      }

    });

  });
JS
);

echo $p->toHTML();


