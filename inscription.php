<?php

    request();

    function request(){
        if($_POST['password'] !== $_POST['confirmPassword']) {
            $error_message = "Les mots de passe ne correspondent pas";
            echo $error_message;
        }else if(check_if_id_exists($_POST['id']) == false) {
            $error_message = "L'identifiant est déjà pris";
            echo $error_message;
        }else {
            $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            save_user_to_db($_POST['id'], $password_hash);
            echo true;
        }
    }
    
    function check_if_id_exists($id) {

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $dsn = "mysql:host=localhost;dbname=biblioteheque_php";
        $db_user = "root";
        $db_pass = "";
        
        try {
            $pdo = new PDO($dsn, $db_user, $db_pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
        
        $query = $pdo->query("SELECT COUNT(*) FROM users WHERE identifiant = '$id'");
        $result = $query->fetchColumn();
        
        if ($result == 0){
            return true;
        }else{
            return false;
        }
        $pdo = null;
    }
    
    function save_user_to_db($id, $password_hash) {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $dsn = "mysql:host=localhost;dbname=biblioteheque_php";
        $db_user = "root";
        $db_pass = "";
        
        try {
            $pdo = new PDO($dsn, $db_user, $db_pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
        
        $query = $pdo->query("INSERT INTO users (password, identifiant, userAcount) VALUES ('".$password_hash."','".$id."', true);");
        $result = $query->rowCount();
        
        if ($result > 0){
            return true;
        }else{
            return false;
        }

        $pdo = null;
    }
?>