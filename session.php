<?php
    session_start();
    $key = $_POST['id'];
    if(isset($_SESSION[$key])) {
        echo $_SESSION[$key];
    } else {
         echo "false";
    }
?>