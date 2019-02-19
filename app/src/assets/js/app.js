$(document).ready(function(){

    mapboxgl.accessToken = 'pk.eyJ1IjoidGhvbWFzMzMiLCJhIjoiY2pzYWFpcXNwMDAxbzN5cGZneGxia3U3ZCJ9.sigYT2nlLnC1siycJ3im-Q';
    var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [4.8320114, 45.7578137],
    zoom: 11
    });


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
                .setHTML(marker.name + '<br> <small class="text-muted">' + marker.address + '</small><br>' + marker.status);
         
                
                // el.addEventListener('click', function() {
                //     window.alert(marker.properties.message);
                // });
                
                // add marker to map
                new mapboxgl.Marker(el)
                    .setLngLat(marker.position)
                    .setPopup(popup)
                    .addTo(map);
            });

            // if(data.error){
            //     console.log("Erreur de connexion");
            // }else{
            //     // Afficher la map
            //     $("#map").show();
                
            //     // Supprimer le formulaire
            //     $("#form").hide();
            // }
        },
        error: function(data){
            console.error();

        }
        
    })

    $("#form").on("submit", function(event){
        event.preventDefault();
        
        // Récupérer pseudo et password du form
        var pseudo = $("input[name=pseudo]").val();
        //console.log(pseudo);
        
        // Récupérer password
        var password = $("input[name=password]").val();
        //console.log(password);
    
        // Stocker dans un tableau les deux valeurs
        var tabForm = [pseudo, password];
        //console.log(tabForm);
        
        // Stocker dans un objet les deux valeurs
        var objForm = { 
            Pseudo : pseudo,
            Password : password
         }
         //console.log(objForm);
         //console.log(objForm.Pseudo) // Select attribut pseudo
    
         serializeForm = $(this).serialize();
        //  console.log(serializeForm);
    
         
         $.ajax({
             type: "GET",
             //dataType: "JSON",
             url: "script.php",
             data: serializeForm,
             success: function(data){
                 console.log(data);
                 data = JSON.parse(data)
                 if(data.error){
                     console.log("Erreur de connexion");
                 }else{
                     // Afficher la map
                     $("#map").show();
                     // Supprimer le formulaire
                     $("#form").hide();
                 }
             },
             error: function(data){
                 console.error();
    
             }
             
         })
    
    });

});
