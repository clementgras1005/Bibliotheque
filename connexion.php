<?php
    request();

    function createPdo(){
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
            return $pdo;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    function request(){
        $pdo = createPdo();
        $query = $pdo->prepare("SELECT password FROM users WHERE identifiant = :identifiant");
        $query->bindParam(':identifiant', $_POST['id']);
        $query->execute();
        $user = $query->fetch();
    
        if(password_verify($_POST['password'], $user['password'])){
            session_start();
            $_SESSION['connected'] = $_POST['id'];
            $pdo = null;
            echo true;
            return;
        }
        echo "Erreur";
        return;
    }
?>