var urlAPI = 'http://localhost/projects/velocity/api';

$('#formLogin').submit(function(event) {
    event.preventDefault();
    // console.log("on submit");
    serializeFormLogin = $(this).serialize();
    //  console.log(serializeFormLogin);
     
     $.ajax({
         type: "post",
         url:  `${urlAPI}/checkUser.php`,
         data: serializeFormLogin,
         success: function(data){
            console.log(data);
            data = JSON.parse(data);
            console.log(data);
            // $("#map").show();
            if(data.username){
                $("#landing").hide();
                $(".modal-backdrop").hide();
                $("#map").show();

                var mapDiv = $("#map");
                var canvasMap = $(".mapboxgl-canvas");

                mapDiv.css("width", "100%");
                canvasMap.css("width", "100%");
                map.resize();
            }
         }
     });

});
// on submit form login
    //afficher username et password (serialize)
    //Ajax request (checkUser.php)