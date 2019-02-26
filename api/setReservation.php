<?php
    header('Access-Control-Allow-Origin: *');

    require('database.php');

    if(isset($_POST['firstname']) && isset($_POST['lastname'])){

        $array = json_decode(Station, true);

        foreach($array as $row){
            $req = $db->prepare("INSERT INTO reservations (id_station, nb_bikes) VALUES ('". $row["number"] ."', '".$row["available_bikes"]."')");
            $db->exec($req);
        }

        
        
        echo "New record created successfully";

    }