<?php
    header('Access-Control-Allow-Origin: *');

    require('database.php');

    // $message = "";
    // $firstnameErr = "";
    // $lastnameErr = "";
    // $usernameErr = "";

    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username'])  && isset($_POST['password']) && isset($_POST['passwordconfirm'])){
        
        $req = $db->prepare("INSERT INTO users (firstname, lastname, username, password, passwordconfirm) VALUES (:firstname, :lastname, :username, :password, :passwordconfirm)");
        
        try{
            $req->execute(array(
                "firstname" => $_POST["firstname"],
                "lastname" => $_POST["lastname"],
                "username" => $_POST["username"],
                "password" => $_POST["password"],
                "passwordconfirm" => $_POST["passwordconfirm"]
            ));
            $_SESSION['username']= $_POST["username"];

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
?>