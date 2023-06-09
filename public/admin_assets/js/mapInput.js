function initialize(class_name) {

    $('form').on('keyup keypress', function(e) {
        var keyCode =e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    const locationInputs = document.getElementsByClassName("map-input");

    const autocompletes = [];
    const geocoder = new google.maps.Geocoder;
    for (let i = 0; i < locationInputs.length; i++) {

        const input = locationInputs[i];
        const fieldKey = input.id.replace("-input", "");
        const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';
         

       

        const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || 31.5204;
        const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 74.3587;

        const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
            center: {lat: latitude, lng: longitude},
            zoom: 8
        });
        var marker = new google.maps.Marker({
            map: map,
            position: {lat: latitude, lng: longitude},
            title: '',
            draggable: true
        });

        marker.setVisible(isEdit);

        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.key = fieldKey;
        autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
    }

    for (let i = 0; i < autocompletes.length; i++) {
        const input = autocompletes[i].input;
        const autocomplete = autocompletes[i].autocomplete;
        const map = autocompletes[i].map;
        const marker = autocompletes[i].marker;

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            marker.setVisible(false);
            const place = autocomplete.getPlace();
            myLatLng = {lat: place.geometry.location.lat(), lng: place.geometry.location.lng()};
                console.log(myLatLng);
            geocoder.geocode({'placeId': place.place_id}, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    const lat = results[0].geometry.location.lat();
                    const lng = results[0].geometry.location.lng();
                    setLocationCoordinates(autocomplete.key, lat, lng);
                }
            });

            if (!place.geometry) {
                window.alert("No details available for input: '" + place.name + "'");
                input.value = "";
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
        });

        google.maps.event.addListener(marker, 'dragend', function(){
            var latLng = marker.getPosition();
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latLng }, function (results) {
                if (results && results.length > 0) {
                    console.log(latLng.lat());
                    console.log(latLng.lng());
                    console.log(results[0].formatted_address);
                    document.getElementById("address-latitude").value = latLng.lat();
                    document.getElementById("address-longitude").value = latLng.lng();
                    document.getElementById("address-input").value = results[0].formatted_address;
                   
                }
            });
        });
    }
   
}




function setLocationCoordinates(key, lat, lng) {
    const latitudeField = document.getElementById(key + "-" + "latitude");
    const longitudeField = document.getElementById(key + "-" + "longitude");
    latitudeField.value = lat;
    longitudeField.value = lng;
}