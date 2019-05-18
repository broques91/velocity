<?php
    session_start();
    header('Access-Control-Allow-Origin: *');



    // Connexion à la base de données
    require('database.php');

    // Si les champs du formulaire sont remplis...
    if(isset($_POST['username']) && isset($_POST['password'])){
        
        //On vérifie que l'utilisateur est bien inscrit dans la base de données
        $q = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password LIMIT 1');
        $q->bindParam(":username", $_POST["username"]);
        $q->bindParam(":password", $_POST["password"]);
        $q->execute();

        $data = $q->fetch(PDO::FETCH_ASSOC);

        $_SESSION['username'] = $_POST["username"];

        if( $data ){
            echo json_encode($data);
        }else{
            echo json_encode( [] );
        }
    }else{
        echo "Veuillez saisir tous les champs";
    }

?>
