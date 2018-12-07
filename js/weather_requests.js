document.onload = function(){
    console.log("Script de requête météo chargé !");
    var request = new AjaxRequest(
        {
        url        : "http://api.openweathermap.org/data/2.5/weather",
        method     : 'GET',
        handleAs   : 'json',
        parameters : { lat: '-25', lon:'15', APPID:'654bdbfedfc84c6d70c1e24c92cbc090'},
        onSuccess  : function(res) {
            /*
                var li = document.createElement('li') ;
                li.appendChild(document.createTextNode(res)) ;
                document.getElementById('test_results').appendChild(li) ;
            */
                window.alert(res.weather.main);
            },
        onError    : function(status, message) {
                window.alert('Error ' + status + ': ' + message) ;
            }
        }
    );
}