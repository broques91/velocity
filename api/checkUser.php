<?php
header('Access-Control-Allow-Origin: *');

$user = [];

// Connect to database
// fetch user in database with SQL request

if( $_POST["username"] == "admin" && $_POST["password"] == "admin" ){
    // echo "Success login";
    
    // Objet
    // var user = {
    //     username: "admin",
    // }
    $user = [
        "username" => "admin"
    ];
}

echo json_encode($user);
