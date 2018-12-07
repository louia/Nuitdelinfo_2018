function myFunction() {
    // Get the checkbox
    var checkBox = document.getElementById("horns");
    // Get the output text      
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      document.getElementsByTagName('body')[0].style.backgroundColor = 'black';
    } else {
        document.getElementsByTagName('body')[0].style.backgroundColor = 'beige';

    }
  }
window.onload = function () {
    

    
    
    function timeConverter(UNIX_timestamp) {
        var a = new Date(UNIX_timestamp * 1000);
        var months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
        var year = a.getFullYear();
        var month = months[a.getMonth()];
        var date = a.getDate();
        var hour = a.getHours();
        var min = a.getMinutes();
        var sec = a.getSeconds();
        var time = date + ' ' + month + ' ' + year + ' ' + hour + 'h';
        return time;
    }
    function icone(meteo) {
        if (meteo == "Clear") {
            document.getElementById('sun').style.display = "block";
        }
        else if (meteo == "Thundrestorm") {
            document.getElementById('orage').style.display = "block";

        }
        else if (meteo == "Drizzle") {
            document.getElementById('pluie').style.display = "block";

        }
        else if (meteo == "Rain") {
            document.getElementById('pluie').style.display = "block";

        }
        else if (meteo == "Snow") {
            document.getElementById('snow').style.display = "block";

        }
        else if (meteo == "Atmosphere") {//brume
            document.getElementById('cloud').style.display = "block";

        }
        else if (meteo == "Clouds") {
            document.getElementById('cloud').style.display = "block";

        }
    }
    function icone2(meteo) {
        if (meteo == "Clear") {
            document.getElementById('sun2').style.display = "block";
        }
        else if (meteo == "Thundrestorm") {
            document.getElementById('orage2').style.display = "block";

        }
        else if (meteo == "Drizzle") {
            document.getElementById('pluie2').style.display = "block";

        }
        else if (meteo == "Rain") {
            document.getElementById('pluie2').style.display = "block";

        }
        else if (meteo == "Snow") {
            document.getElementById('snow2').style.display = "block";

        }
        else if (meteo == "Atmosphere") {//brume
            document.getElementById('cloud2').style.display = "block";

        }
        else if (meteo == "Clouds") {
            document.getElementById('cloud2').style.display = "block";

        }
    }

    var angle = 0;
    var speed = 0;

    /* Liaison avec l'API */
    var meteo_request = new AjaxRequest(
        {
            url: "http://api.openweathermap.org/data/2.5/weather",
            method: 'GET',
            handleAs: 'json',
            parameters: { lat: '-25', lon: '15', APPID: '654bdbfedfc84c6d70c1e24c92cbc090' },
            onSuccess: function (res) {
                console.log(res);
                var meteo = res['weather'][0]['main'];
                icone(meteo);
                displayBoussole(res['wind']['deg'], res['wind']['speed']);
                document.getElementById('temp').innerHTML = ((res['main']['temp']) - 273.15).toFixed(2) + " °C";
                document.getElementById('hum').innerHTML = (res['main']['humidity']) + " %";

            },
            onError: function (status, message) {
                window.alert('Error ' + status + ': ' + message);
            }
        }
    );
    var meteo_requestj2 = new AjaxRequest(
        {
            url: "http://api.openweathermap.org/data/2.5/forecast",
            method: 'GET',
            handleAs: 'json',
            parameters: { lat: '-25', lon: '15', APPID: '654bdbfedfc84c6d70c1e24c92cbc090' },
            onSuccess: function (res) {
                console.log(res);
                var time = timeConverter(res['list']['18']['dt']);
                document.getElementById('date').innerHTML = time;
                document.getElementById('tempj2').innerHTML = (res['list']['18']['dt']);

                document.getElementById('tempj2').innerHTML = ((res['list']['18']['main']['temp']) - 273.15).toFixed(2) + " °C";
                document.getElementById('humj2').innerHTML = (res['list']['18']['main']['humidity']) + " %";
                var meteo = res['list']['18']['weather'][0]['main'];
                icone2(meteo);
            },
            onError: function (status, message) {
                window.alert('Error ' + status + ': ' + message);
            }
        }
    );

    displayBoussole = function (angle_, speed_) {
        angle = angle_;
        speed = speed_;
        console.log(angle);

        var direction = document.getElementById('directionn');
        var vent = document.getElementById('fleche');
        var dir = document.getElementById('dir');

        direction.innerHTML = "" + speed + " m/s";
        if (angle > 337.5 || angle <= 22.5) {
            vent.className = "arrow n";
            dir.innerHTML = "N";
        }
        else if (angle > 22.5 && angle <= 67.5) {
            vent.className = "arrow ne";
            dir.innerHTML = "NE";
        }
        else if (angle > 67.5 && angle <= 112.5) {
            vent.className = "arrow e";
            dir.innerHTML = "E";
        }
        else if (angle > 112.5 && angle <= 157.5) {
            vent.className = "arrow se";
            dir.innerHTML = "SE";
        }
        else if (angle > 157.5 && angle <= 202.5) {
            vent.className = "arrow s";
            dir.innerHTML = "S";
        }
        else if (angle > 202.5 && angle <= 247.5) {
            vent.className = "arrow sw";
            dir.innerHTML = "SW";
        }
        else if (angle > 247.5 && angle <= 292.5) {
            vent.className = "arrow w";
            dir.innerHTML = "W";
        }
        else if (angle > 292.5 && angle <= 337.5) {
            vent.className = "arrow nw";
            dir.innerHTML = "NW";
        }
    }
}
