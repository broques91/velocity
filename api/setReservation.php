<?php
    header('Access-Control-Allow-Origin: *');

    require('database.php');

    var_dump(json_decode($station));
    var_dump(json_decode($station, true));




    // if(isset($_POST['firstname']) && isset($_POST['lastname'])){

    //     // $array = json_decode(Station, true);
    //     $req = $db->prepare("INSERT INTO users (id_station,nb_bikes) VALUES ()");
    //     // foreach($array as $row){
    //     //     $req = $db->prepare("INSERT INTO reservations (id_station, nb_bikes) VALUES ('". $row["number"] ."', '".$row["available_bikes"]."')");
    //     //     $db->exec($req);
    //     // }

        
        
       

    // }