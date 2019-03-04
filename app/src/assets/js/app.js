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
            $(el).attr('data-id', marker.number);
            var station = {
                stationId: marker.number,
                stationName: marker.name,
                stationAddress: marker.address,
                stationStatut: marker.status,
                stationPlaces: marker.available_bike_stands,
                stationBikes: marker.available_bikes,
                stationPayment: marker.banking
            }

            if(marker.status === 'OPEN'){
                $('.test').css('color', 'green');
              }else{
                $('.test').css('color', 'red');
            }

            
            // create the popup
            var popup = new mapboxgl.Popup({ offset: 25,}).setHTML(`
            <div>
                <div >
                    <div >
                        <div>
                            <h5 class="modal-title" id="exampleModalLabel-${marker.number}">Info Stations</h5>
                        </div>
                        <div >
                            <!-- <div class="mb-3 text-center">
                                <img src="src/assets/img/velo.png" width="300">
                            </div> -->
                            <h3 id="station_name" class="mt-3">${marker.name}</h3>
                            <i class="mr-2 mb-3 fas fa-map-marker-alt"></i><small id="station_adress-${marker.number}" class="text-muted"/>${marker.address}</small>
                            <ul>
                                <li><i class="mr-3 fas fa-sort"></i>Etat : <span class="test" id="status-${marker.number}">${marker.status}</span> </li>
                                <li><i class="mr-3 fas fa-bicycle"></i>Vélos disponibles : <span id="veloDispo-${marker.number}">${marker.available_bikes}</span> </li>
                                <li><i class="mr-3 fas fa-parking"></i>Places disponibles : <span id="placeDispo-${marker.number}">${marker.available_bike_stands}</span></li>
                                <li><i class="mr-3 far fa-credit-card"></i><span id="paiementDispo-${marker.number}"></span>${marker.banking}</li></li>
                                
                            </ul>
                            <form id="formReservation-${marker.number}" class="my-3" action="" onsubmit="reservationVelo(${marker.available_bikes}, ${marker.number});"  method="post" data-quantite="${marker.available_bikes}" data-id="${marker.number}">
                                    <div class="form-group">
                                        <input type="text" name="firstname" class="form-control" placeholder="Prénom">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="lastname" class="form-control" placeholder="Nom">
                                    </div>
                                    <div class=-modal-footer>
                                        <div class="form-group">
                                            <input type="submit"  name="submitReservation" value="Reserver" class="btn btn-block btn-danger ">
                                        </div>
                                    </div>
                            </form>

                        </div>
                        
                    </div>
                </div>
            </div>
            `);
            // $(el).off('click');
            
            // add marker to map
            new mapboxgl.Marker(el)
                .setLngLat(marker.position)
                .setPopup(popup)
                .addTo(map);
            
        });

    },
    error: function(data){
        console.error();
    }
});

function reservationVelo(i, j){
        event.preventDefault();

        // console.log(user.id);
        quantite = i;
        formId = j;
        console.log(quantite);

       


            // AJAX request
            $.ajax({
                type: "POST",
                url: `${urlAPI}/setReservation.php`,
                data: 'stationId='+formId+'&userId='+user.id+'&nb_bikes='+quantite,
                success: function(response){
                    console.log(response);
                    quantite--;
                    marker.available_bikes--;
                    console.log(quantite);
                    $('#formReservation-'+formId).attr("onsubmit", "reservationVelo("+quantite+','+formId+")");
                    $('#veloDispo-'+formId).html(quantite);
                    placesDisponibles = $('#placeDispo-'+formId).html(); 
                    placesDisponibles++;
                    $('#placeDispo-'+formId).html(placesDisponibles);
                    if( quantite <= 0){
                        $('.mapboxgl-popup-content').css('background-color', 'red');
                        alert('Plus aucun vélo disponible !');
                    }
                   
                    //$(el).unbind();
                    // $("footer").show()
                }

            });
       
        
}$(document).ready(function() {
    $('form').on('submit', function(e){
        e.preventDefault();
    });
  });