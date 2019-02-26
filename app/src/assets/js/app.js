var user;

// Sidebar
 $("#sidebar").mCustomScrollbar({
    theme: "minimal"
});

$('#dismiss, .overlay').on('click', function () {
    // hide sidebar
    $('#sidebar').removeClass('active');
    // hide overlay
    $('.overlay').removeClass('active');
});

$('#sidebarCollapse').on('click', function () {
    // open sidebar
    $('#sidebar').addClass('active');
    // fade in the overlay
    $('.overlay').addClass('active');
    $('.collapse.in').toggleClass('in');
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
});

// Mapbox
mapboxgl.accessToken = 'pk.eyJ1IjoidGhvbWFzMzMiLCJhIjoiY2pzYWFpcXNwMDAxbzN5cGZneGxia3U3ZCJ9.sigYT2nlLnC1siycJ3im-Q';
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [4.8320114, 45.7578137],
zoom: 15
});

var urlAPI = 'http://localhost/projects/velocity/api';

$.ajax({
    type: "GET",
    //dataType: "JSON",
    url: "https://api.jcdecaux.com/vls/v1/stations?contract=Lyon&apiKey=18125dec00ffb281d822ceefb633311dc8ba4d7d",
    
    success: function(data){
        console.log(data);

        data.forEach(function(marker) {
            // create a DOM element for the marker
            var el = document.createElement('div');
            el.id = 'marker';

            Station = {
                stationId: marker.number,
                stationName: marker.name,
                stationAddress: marker.address,
                stationStatut: marker.status,
                stationPlaces: marker.available_bike_stands,
                stationBikes: marker.available_bike
            }


            // create the popup
            var popup = new mapboxgl.Popup({ offset: 25 })

                    
            el.addEventListener('click', function() {
                $('#exampleModal2').modal('show');
                $("#station_name").text(marker.name);
                $("#station_adress").text(marker.address);
                $("#status").text(marker.status);
                $("#veloDispo").text(marker.available_bikes);
                $("#placeDispo").text(marker.available_bike_stands);
                $("#paiementDispo").text(marker.banking);
                $("#getidStation").text(marker.number);

                $('#formReservation').submit(function(event){
                    event.preventDefault();
                    console.log(marker.number);
                    console.log(user.id);
                    // AJAX request
                    $.ajax({
                        type: "POST",
                        url: `${urlAPI}/setReservation.php`,
                        data: Station,
                        success: function(data){
                            // console.log(data);
                        }
                    });
                });
            });


            // <form onSubmit="formSubmitPopup(event, $(marker.number), ${id_user})">
            //     <input class="btn btn-sm btn-light" type="submit" value="RESERVER">
            // </form>
            
            // add marker to map
            new mapboxgl.Marker(el)
                .setLngLat(marker.position)
                .addTo(map);

            
        });

    },
    error: function(data){
        console.error();
    }
});






