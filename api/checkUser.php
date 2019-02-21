<?php
    header('Access-Control-Allow-Origin: *');

    require('database.php');

    if(isset($_POST['username']) && isset($_POST['password'])){
        
        $req = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password LIMIT 1');
        $req->execute(array(
            "username" => $_POST["username"],
            "password" => $_POST["password"]
        ));
        $result =$req->fetch();

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
