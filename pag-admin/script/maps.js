
function geocodeAddress(geocoder, resultsMap, address) {
    geocoder.geocode({ 'address': address }, function (results, status) {
        if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            const marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

function initMap(){
    const geocoder = new google.maps.Geoconder();
    const map = new google.maps.Map(document.getElementById("local"), {
        zoom: 8,
        center: {lat: -34.397, lng: 150.644}
    });

    geocodeAddress(geocoder, map, "<?php  echo $local;?>")

}








