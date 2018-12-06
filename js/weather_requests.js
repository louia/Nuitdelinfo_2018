window.onload = function(){
    console.log("Script de requête météo chargé !");
    
    var request = new AjaxRequest(
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
};