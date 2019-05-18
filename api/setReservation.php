<?php
    header('Access-Control-Allow-Origin: *');

    // Connexion à la base de données
    require('database.php');
    global $db;
    
    $now = new DateTime();
    function updateReservations($db){
        $q = $db->prepare("DELETE FROM reservations WHERE date_reservation <= NOW() - INTERVAL 20 MINUTE ");
        $q->execute();
    }


    if(isset($_POST['stationId']) && isset($_POST['userId']) && isset($_POST['nb_bikes']) ){
        $id_station = $_POST['stationId'];
        $id_user    = $_POST['userId'];
        $nb_bikes   = $_POST['nb_bikes'];
        $data = [
            'id_station' => $id_station,
            'id_user'    => $id_user,
            'nb_bikes'   => $nb_bikes
        ];

        //SELECT ALL RESERVATIONS
        $q = $db->prepare("SELECT * FROM `reservations` WHERE `id_station` = '".$id_station."' AND `id_user` = '".$id_user."' ");
        $q->execute();
        $count = $q->rowCount();
        // SI RESERVATION DU MEME USER SUR LA MEME STATION
        if ( $count > 0){
            // DELETE ALL RESERVATIONS > 20 MINUTES
            updateReservations($db);
            // UPDATE SQL
            echo "Vous avez déjà une réservation dans cette station";
            $q = $db->prepare("UPDATE `reservations` SET `date_reservation` = NOW() WHERE `id_station` = '".$id_station."' AND `id_user` = '".$id_user."' ");
            $q->execute();
            $data = $q->fetch(PDO::FETCH_ASSOC);
            echo "Update réservation OK";
        // SI PAS DE RESERVATION ===> INSERT
        }else{
            $sql = "INSERT INTO reservations (id_station, id_user, nb_bikes) VALUES (:id_station, :id_user, :nb_bikes)";
             if( $db->prepare($sql)->execute($data)){
                 echo 'OK';
            }
        }
    }
