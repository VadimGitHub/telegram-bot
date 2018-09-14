$(document).ready(function () {

    /**
     * инициализация карты
     */
    function initMap() {
        var barnaul = createPlace(53.36056, 83.76361);

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: barnaul
        });

        createMarker(map, barnaul);

        return map;
    }

    var map = initMap();
    getGeoData(map);

    /**
     * @param map - карта
     * @param position - место
     */
    function createMarker(map, position) {
        return new google.maps.Marker({
            position: position,
            map: map
        })
    }

    /**
     * @param lat - широта
     * @param lng - долгота
     * @returns {{lat: *, lng: *}}
     */
    function createPlace(lat, lng) {
        return {
            lat: lat,
            lng: lng
        }
    }

});

/**
 * Получение данных с сервера
 */
function getGeoData(map) {
    return $.ajax({
        type: 'POST',
        url: 'geodata/get-all-data',
        dataType: 'json',
        success: function (data) {

            console.log(data);

            for (var i = 0; i < data.length; i++) {
                console.log(123);
                var plc = createPlace(data[i]['lat'], data[i]['lng']);
                createMarker(map, plc);
            }
        },
        error: function () {
            console.log('Не удалось получить данные');
        }
    });
}
