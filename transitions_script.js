/*global $*/
$('document').ready(function(){
    var moon = $("#moon");
    var sky = $("#sky");
            
    // Toggle between the start and end classes, which in the CSS has the bottom transition
    setTimeout(function(){
        moon.toggleClass('moonstart moonend');
        sky.toggleClass('skystart skyend');
    }, 250);
    
    // Determine location and get data from API
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(location){
            var lat = location.coords.latitude.toFixed(2);
            var lon = location.coords.longitude.toFixed(2);
            
            var coordinates = "lat=" + lat + "&lon=" + lon;
            
            var apiURL = getApiUrl(coordinates, getDate());
            
            $.get(apiURL).done(function(data){
                var xml = $(data);
                var moon = xml.find("moon");
                var moonData = {
                    phase: moon.attr('phase'),
                    rise: moon.attr('rise'),
                    set: moon.attr('set')
                }
                console.log(moonData);
            });
        });
    } else {
        alert("Geolocation is not supported by this browser."); 
    }
    
    // Determines the current date
    function getDate(){
        var today = new Date();
        var year = today.getFullYear();
        var month = today.getMonth()+1;
        month = '0' + month;
        var day = '0' + today.getDate();
        return 'date=' + year + '-' + month.slice(-2) + '-' + day.slice(-2);
    }
    
    // Assembles the API url
    function getApiUrl(latlon, date) {
        var api = 'https://api.met.no/weatherapi/sunrise/1.1/';
        return api + '?' + latlon + '&' + date;
    }
});