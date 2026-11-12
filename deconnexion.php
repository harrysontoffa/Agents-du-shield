<?php
session_start();

// Vider TOUTE la session (pas seulement "curentUser")
$_SESSION = array();

// Supprimer le cookie de session dans le navigateur
if(ini_get("session.use_cookies")){
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Détruire la session côté serveur
session_destroy();

// Rediriger vers connexion
header("Location: connexion.php");
exit;
