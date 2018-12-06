window.onload = function(){
    console.log("Script de requête météo chargé !");
    function timeConverter(UNIX_timestamp){
        var a = new Date(UNIX_timestamp * 1000);
        var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        var year = a.getFullYear();
        var month = months[a.getMonth()];
        var date = a.getDate();
        var hour = a.getHours();
        var min = a.getMinutes();
        var sec = a.getSeconds();
        var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
        return time;
      }
    var request1 = new AjaxRequest(
        {
        url        : "http://api.openweathermap.org/data/2.5/weather",
        method     : 'GET',
        handleAs   : 'json',
        parameters : { lat: '-25', lon:'15', APPID:'654bdbfedfc84c6d70c1e24c92cbc090'},
        onSuccess  : function(res) {
            console.log(res);
            console.log(res['main']['temp']);
            var temperature = (res['main']['temp'] - 273.5).toFixed(2);
            console.log(temperature);
            alert("Il fait : " + temperature + "°C");
            },
        onError    : function(status, message) {
                window.alert('Error ' + status + ': ' + message) ;
            }
        }
    );
    var request2 = new AjaxRequest(
        {
        url        : "http://api.openweathermap.org/data/2.5/forecast",
        method     : 'GET',
        handleAs   : 'json',
        parameters : { lat: '-25', lon:'15', APPID:'654bdbfedfc84c6d70c1e24c92cbc090'},
        onSuccess  : function(res) {
            console.log(res);
            console.log(res['main']['temp']);
            var temperature = (res['main']['temp'] - 273.5).toFixed(2);
            console.log(temperature);
            alert("Il fait : " + temperature + "°C");
            },
        onError    : function(status, message) {
                window.alert('Error ' + status + ': ' + message) ;
            }
        }
    );

};