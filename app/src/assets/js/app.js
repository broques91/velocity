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


//Compte à rebours réservation
var secon=0 ;//initialise les secondes 
var minu=20; //initialise les minutes 
var heur=0; //initialise les minutes 
function deleteReservation(i){
    //Requete ajax
    $.ajax({
        type: "POST",
        url: `${urlAPI}/deleteReservation.php`,
        data: 'stationId='+formId+'&userId='+user.id+'&nb_bikes='+quantite,
            success: function(response){
                console.log(response);
            }
    });
}
function reservationChrono(i){ 
    
    if (secon != 0 || minu != 0 || heur != 0){// si on n'atteind pas 00:00:00 
        secon--; 
        if (secon<0){
            secon=59; 
            if (minu >0){
                 minu--;
            }else{
                minu=59; 
                heur--;
            } 
        } 
        if (secon < 10 ){
             secondes = '0'+secon;
        }else {
            secondes = secon;
        } 
        if (minu < 10 ) {
            minutes = '0'+minu;
        }else {
            minutes = minu;
        } 
        if (heur < 10 ) {
            heures = '0'+heur;
        }else {heures = heur;
        }
        if(minu == 0 && secon == 0 ){
            deleteReservation(i);
            $("footer").hide(500);
        }
        document.getElementById('stopwatch').innerHTML = heures+' : '+minutes+' : '+secondes; 
        compte=setTimeout('reservationChrono()',1000); //la fonction est relancée tous les secondes 
    } 
} 

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
            <div class="container">
                <div class="card-header bg-light text-center">
                    <h5>Infos Station</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">${marker.name}</h5>
            
                    <i class="text-muted fas fa-map-marker-alt"></i>
                    <span class="card-subtitle mb-2 text-muted" id="station_adress-${marker.number}">${marker.address}</span>
                  
                </div>

                <ul class="list-group list-group-flush">
                
                    <li class="list-group-item"><i class="mr-3 fas fa-sort"></i><span class="test" id="status-${marker.number}">${marker.status}</span> </li>
                    <li class="list-group-item">
                    <div class="detailsStation">
                        <div> 
                            <span id="veloDispo-${marker.number}">${marker.available_bikes}</span> <i class= "fas fa-bicycle"></i>
                        </div>
                        <div> 
                            <span id="placeDispo-${marker.number}">${marker.available_bike_stands}</span> <i class="fas fa-parking"></i>
                        </div>
                        <div>
                            <i class="mr-3 far fa-credit-card"></i><span id="paiementDispo-${marker.number}"></span>${marker.banking}
                        </div>
                    </div>
                    </li>
                   
                    
                </ul>
                
                <div>
                    <form id="formReservation-${marker.number}" class="my-3" action="" onsubmit="reservationVelo(${marker.available_bikes}, ${marker.number});"  method="post" data-quantite="${marker.available_bikes}" data-id="${marker.number}">
                        <div class="form-group">
                            <input type="text" name="firstname" class="form-control" placeholder="Prénom">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lastname" class="form-control" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <input type="submit"  name="submitReservation" value="Reserver" class="btn btn-block btn-danger ">
                        </div>
                    </form>
                </div>
            </div>
            
            `);
            
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
                   
                    reservationChrono(); 
                    $("footer").show();
                }

            });
       
        
}$(document).ready(function() {
    $('form').on('submit', function(e){
        e.preventDefault();
    });
  });