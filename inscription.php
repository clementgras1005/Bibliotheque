<?php
    
    if(isset($_POST['password']) || isset($_POST['confirmPassword']) isset($_POST['id'])){
        $error_message = "Toutes les champs demandé ne sont pas remplie";
    }else if($_POST['password'] !== $_POST['confirmPassword']) {
        $error_message = "Les mots de passe ne correspondent pas";
    }else if(check_if_id_exists($_POST['id'])) {
        $error_message = "L'identifiant est déjà pris";
    }else {
        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        save_user_to_db($_POST['id'], $password_hash);
        $success_message = "L'utilisateur a été enregistré avec succès";
    }
    
    function check_if_id_exists($id) {
        // Vérifier en bdd si l'identifiant existe déjà
        // Retourner true si l'identifiant existe, false sinon
    }
    
    function save_user_to_db($id, $password_hash) {
        // Enregistrer l'utilisateur en bdd avec l'identifiant et le mot de passe hashé
    }
?>