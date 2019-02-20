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
zoom: 11
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

            // create the popup
            var popup = new mapboxgl.Popup({ offset: 25 })
        
            .setHTML(`  <div id="popup">
                            <h5 class="popupTitle">${marker.name}</h5> 
                            <h6 class="popupSubtitle">${marker.address}</h6>
                            <div class="row popupContent">
                                <div class="col-6">
                                    ${marker.available_bikes} <i class="fas fa-bicycle"></i>
                                </div>
                                <div class="col-6 text-right">
                                    ${marker.status}
                                </div>
                            </div>

                            <div class="text-center">
                            <form onSubmit="formSubmitPopup(event)">
                                <input class="btn btn-sm btn-light" type="submit" value="RESERVER">
                            </form>
                            </div>
                        </div>
                    `);
            
            // el.addEventListener('click', function() {
            //     window.alert(marker.properties.message);
            // });
            
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

function formSubmitPopup(event){
    event.preventDefault();
    // AJAX request
    $.ajax({
        type: "POST",
        url: `${urlAPI}/index.php`,
        data: "test",
        success: function(data){
            console.log(data);
        }
    });
}


