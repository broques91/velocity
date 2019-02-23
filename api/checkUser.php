<?php
    header('Access-Control-Allow-Origin: *');

    require('database.php');

    if(isset($_POST['username']) && isset($_POST['password'])){
        
        $q = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password LIMIT 1');
        $q->bindParam(":username", $_POST["username"]);
        $q->bindParam(":password", $_POST["password"]);
        $q->execute();

        $result = $q->fetch(PDO::FETCH_ASSOC);

        if(!$result){
            echo "error";
        }else{
            session_start();
            $username = $_POST["username"];
            $password = $_POST["password"];
            $return_arr[] = array(
                "username" => $username,
                "password" => $password);
            echo json_encode($return_arr);
        }
    }else{
        echo "Veuillez saisir tous les champs";
    }

?>
