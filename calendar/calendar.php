<?php

require_once '../class_php/webpage.class.php';

$page = new WebPage("Calendrier");

$page->appendToHead(<<<HEAD
  <meta charset='utf-8' />
  <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
  <link href='fullcalendar.css' rel='stylesheet' />
  <link href='fullcalendar.print.css' rel='stylesheet' media='print' />
  <script src='lib/moment.min.js'></script>
  <script src='lib/jquery.min.js'></script>
  <script src='fullcalendar.js'></script>
  <script src='locale-all.js'></script>
  <script src='demos/js/theme-chooser.js'></script>
  <script type="text/javascript" src='../js/AjaxRequest.js'></script>
HEAD
);

$page->appendContent(<<<BODY

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

BODY
);

$page->appendCss(<<<CSS
  body {
    margin: 0;
    padding: 0;
    font-size: 14px;
  }

  div.input-group, button {
    margin-bottom : 5px;
  }
  button.btn.btn-primary, button.btn.btn-primary.active {
    background-color: #003366;
  }

  button {
      background-color: #003366;
      color: white;
      width: 100%;
  }

  #top,
  #calendar.fc-unthemed {
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
  }

  #top {
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    font-size: 12px;
    color: #000;
  }

  #top .selector {
    display: inline-block;
    margin-right: 10px;
  }

  #top select {
    font: inherit; /* mock what Boostrap does, don't compete  */
  }

  .left { float: left }
  .right { float: right }
  .clear { clear: both }

  #calendar {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 10px;
  }
CSS
);

$page->appendJs(<<<JS


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
            url: 'calendar.json',
            type: 'POST',
            error: function() {
              alert('there was an error while fetching events!');
            },
            color: '#003366',   // a non-ajax option
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

echo $page->toHTML();
