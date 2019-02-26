<?php
    header('Access-Control-Allow-Origin: *');

    require('database.php');

    if(isset($_POST['username']) && isset($_POST['password'])){
        
        $q = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password LIMIT 1');
        $q->bindParam(":username", $_POST["username"]);
        $q->bindParam(":password", $_POST["password"]);
        $q->execute();

        $data = $q->fetch(PDO::FETCH_ASSOC);

        if( $data ){
            echo json_encode($data);
        }else{
            echo json_encode( [] );
        }
    }else{
        echo "Veuillez saisir tous les champs";
    }

?>
