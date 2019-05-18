var urlAPI = 'http://localhost/projects/velocity/api';

$('#formLogin').submit(function(event) {
    event.preventDefault();
    serializeFormLogin = $(this).serialize();
     
    // Requête Ajax
     $.ajax({
         type: "post",
         url:  `${urlAPI}/checkUser.php`,
         data: serializeFormLogin,
         success: function(data){
            data = JSON.parse(data);

            user = data;
            // console.log(user);
            
            // Si l'utilisateur s'est loggé avec succès => Affichage du menu principal de l'appli...
            if(data.username){
                $("#test").hide();
                $(".modal-backdrop").hide();
                $(".navbar").show();
                $("#map").show();
                // $("footer").show();

                var mapDiv = $("#map");
                var canvasMap = $(".mapboxgl-canvas");

                mapDiv.css("width", "100%");
                canvasMap.css("width", "100%");
                map.resize();
            }
         }
     });

});
