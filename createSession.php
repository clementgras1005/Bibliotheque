<?php   
    if(isset($_POST['id'])){
        session_start();
        $_SESSION['connected'] = $_POST['id'];
        echo $_POST['id'];
    }
?>