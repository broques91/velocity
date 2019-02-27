<?php
    header('Access-Control-Allow-Origin: *');

    require('database.php');
    global $db;

     if(isset($_POST['stationId']) && isset($_POST['userId']) && isset($_POST['nb_bikes']) ){
        $id_station = $_POST['stationId'];
        $id_user = $_POST['userId'];
        $nb_bikes = $_POST['nb_bikes'];
         $data = [
            'id_station' => $id_station,
            'id_user' => $id_user,
            'nb_bikes' => $nb_bikes
        ];
         $sql = "INSERT INTO reservations (id_station, id_user, nb_bikes) VALUES (:id_station, :id_user, :nb_bikes)";
     if( $db->prepare($sql)->execute($data)){
         echo 'OK';
     }
     
    }
