var x = $(".location-name");

function getLocation(){
    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
    else{
        x.value="Geolocation is not supported by this browser.";
    }
}

function showPosition(position){
    lat=position.coords.latitude;
    lon=position.coords.longitude;
    displayLocation(lat,lon);
}

function showError(error){
    switch(error.code){
        case error.PERMISSION_DENIED:
            x.value="User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.value="Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.value="The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.value="An unknown error occurred."
            break;
    }
}

function displayLocation(latitude,longitude){
    var geocoder;
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(latitude, longitude);

    geocoder.geocode(
        {'latLng': latlng},
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var add= results[0].formatted_address ;
                    var  value=add.split(",");

                    count=value.length;
                    country=value[count-1];
                    state=value[count-2];
                    city=value[count-3];
                    x.val(city);
                }
                else  {
                    x.value = "address not found";
                }
            }
            else {
                x.value = "Geocoder failed due to: " + status;
            }
        }
    );
}
