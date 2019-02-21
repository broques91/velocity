<?php

    require('database.php');

    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username'])  && isset($_POST['password']) && isset($_POST['passwordconfirm'])){

        $req = $db->prepare("INSERT INTO users (firstname, lastname, username, password, passwordconfirm) VALUES (:firstname, :lastname, :username, :password, :passwordconfirm) LIMIT 1");
        try{

            $req->execute(array(
                "firstname" => $_POST["firstname"],
                "lastname" => $_POST["lastname"],
                "username" => $_POST["username"],
                "password" => $_POST["password"],
                "passwordconfirm" => $_POST["passwordconfirm"]
            ));

            session_start();
            $username = $_POST["username"];
            $password = $_POST["password"];
            $return_arr[] = array(
                "username" => $username,
                "password" => $password);
            
            echo json_encode($return_arr);
        }catch (Exception $e){
            echo "error";
        }
        

    }