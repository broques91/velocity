<?php
    header('Access-Control-Allow-Origin: *');

    // Connexion à la bdd
    require('database.php');
    global $db;

    $now = new DateTime();
    // echo $now->format('Y-m-d-');

    // Suppresion de la résevation
    $q = $db->prepare("DELETE FROM reservations WHERE date_reservation <= NOW() - INTERVAL 20 MINUTE ");
    $q->execute();
    echo 'Delete OK';
