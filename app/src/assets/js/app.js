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
        

        data.forEach(function(marker) {
            // create a DOM element for the marker
            var el = document.createElement('div');
            el.id = 'marker';

            var station = {
                stationId: marker.number,
                stationName: marker.name,
                stationAddress: marker.address,
                stationStatut: marker.status,
                stationPlaces: marker.available_bike_stands,
                stationBikes: marker.available_bikes,
                stationPayment: marker.banking
            }

            // create the popup
            var popup = new mapboxgl.Popup({ offset: 25 })
                    
            $(el).click(function(){
            // el.addEventListener('click', function() {
                $('#exampleModal2').modal('show');
                $("#station_name").html(station.stationName);
                $("#station_adress").html(station.stationAddress);
                $("#status").html(station.stationStatut);
                $("#veloDispo").html(station.stationBikes);
                $("#placeDispo").html(station.stationPlaces);
                $("#paiementDispo").html(station.stationPayment);

                $('#formReservation').submit(function(event){
                    event.preventDefault();

                    console.log(marker.number);
                    console.log(user.id);
                    console.log(station);  

                    if(station.stationBikes > 0){
                        // AJAX request
                        $.ajax({
                            type: "POST",
                            url: `${urlAPI}/setReservation.php`,
                            data: 'stationId='+station.stationId+'&userId='+user.id+'&nb_bikes='+station.stationBikes,
                            success: function(response){
                                // console.log(response);
                                station.stationBikes--;
                                station.stationPlaces++;
                                // console.log(station.stationBikes);
                                $('#veloDispo').html(station.stationBikes);
                                $('#placeDispo').html(station.stationPlaces);
                                $("footer").show()
                            }
                        });
                    }else{
                        alert('Réservation impossible ! Aucun vélo disponible')
                    }
                    
                });
            });
            
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



