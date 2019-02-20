<?php
    header('Access-Control-Allow-Origin: *');

    require('api/database.php');

    // $user = [];

    // // Connect to database
    // // fetch user in database with SQL request

    // if( $_POST["username"] == "admin" && $_POST["password"] == "admin" ){

    //     // echo "Success login";
        
    //     // Objet
    //     // var user = {
    //     //     username: "admin",
    //     // }
    //     $user = [
    //         "username" => "admin"
    //     ];
    // }

    // echo json_encode($user);

    if(isset($_POST['username']) && isset($_POST['password'])){
        
        $req = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
        $req->execute(array(
            "username" => $_POST["username"],
            "password" => $_POST["password"]
        ));
        $result =$req->fetch();

        if(!$result){
            // header("Location: login.php");
            alert('wrong username or password');
        }else{
            session_start();
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];
            // header("Location: admin.php");
        }
    }else{
        echo "Veuillez saisir tous les champs";
    }

?>
