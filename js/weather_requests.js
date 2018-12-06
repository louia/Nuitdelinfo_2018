window.onload = function(){
    
    var request = new AjaxRequest(
        {
        url        : "http://api.openweathermap.org/data/2.5/weather",
        method     : 'GET',
        handleAs   : 'json',
        parameters : { lat: '-25', lon:'15', APPID:'654bdbfedfc84c6d70c1e24c92cbc090'},
        onSuccess  : function(res) {
            document.getElementsByTagName('body')[0].innerHTML = JSON.stringify(res, null, "\t");
            },
        onError    : function(status, message) {
                window.alert('Error ' + status + ': ' + message) ;
            }
        }
    );
};