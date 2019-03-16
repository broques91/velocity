<?php
    header('Access-Control-Allow-Origin: *');

    require('database.php');

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordconfirm = $_POST["passwordconfirm"];
 

    if(isset($firstname) && isset($lastname) && isset($username) && isset($password) && isset($passwordconfirm)){

        $q = $db->prepare('SELECT COUNT(username) AS num FROM users WHERE username = :username');
        $q->bindParam(":username", $username);
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        
        // Vérifie si le pseudo est déjà utilisé
        if($row['num'] > 0){
            die('That username already exists!');
        // Sinon inscription de l'utilisateur dans la base de donnnée
        }else{
            $q = $db->prepare("INSERT INTO users (firstname, lastname, username, password, passwordconfirm) VALUES (:firstname, :lastname, :username, :password, :passwordconfirm)");
            
            try{
                $q->bindParam(":firstname", $firstname);
                $q->bindParam(":lastname", $lastname);
                $q->bindParam(":username", $username);
                $q->bindParam(":password", $password);
                $q->bindParam(":passwordconfirm", $passwordconfirm);
                $result = $q->execute();
    
                if( $result ){
                    echo json_encode($result);
                }else{
                    echo json_encode( [] );
                }
            }catch (Exception $e){
                echo "error";
            }  
        }   
    }   
?>