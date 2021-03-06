var urlAPI = 'http://localhost/projects/velocity/api';

$('#formSignup').submit(function(event) {
    event.preventDefault();
    serializeFormSignup = $(this).serialize();
     
    //Requête Ajax
     $.ajax({
         type: "post",
         url:  `${urlAPI}/signUser.php`,
         data: serializeFormSignup,
         success: function(data){
            data = JSON.parse(data);
                $("#test").hide();
                $(".modal-backdrop").hide();
                $(".navbar").show();
                $("#map").show();

                var mapDiv = $("#map");
                var canvasMap = $(".mapboxgl-canvas");

                mapDiv.css("width", "100%");
                canvasMap.css("width", "100%");
                map.resize();
            
         }
     });

});