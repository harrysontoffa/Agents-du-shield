<?php 
session_start();

// Page protégée : si personne n'est connecté, retour à la connexion
if (empty($_SESSION["curentUser"])) {
    header("Location: connexion.php");
    exit;
}

// Empêche le navigateur de garder la page en cache (bouton "retour" après déconnexion)
header("Cache-Control: no-store, no-cache, must-revalidate");

$role = "";
if($_SESSION["curentUser"]['id_Role'] == 1){
    $role="Administrateur";
} else if ($_SESSION["curentUser"]['id_Role'] == 2){
    $role="Manager";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    
<main class="profile-container">

    <div class="profile-card">

        <div class="profile-header">
            <div>
                <h2>Mon profil</h2>
                <p>Informations de votre compte</p>
            </div>

            <span class="role-badge"><?php echo $role; ?></span>
        </div>

        <div class="profile-infos">

            <div class="info-item">
                <label>Prénom</label>
                <p><?php echo(@$_SESSION["curentUser"]['lastname']); ?></p>
            </div>

            <div class="info-item">
                <label>Nom</label>
                <p><?php echo(@$_SESSION["curentUser"]['firstname']); ?></p>
            </div>

            <div class="info-item">
                <label>Adresse email</label>
                <p><?php echo(@$_SESSION["curentUser"]['email']); ?></p>
            </div>

        </div>

    </div>

</main>
    
</body>
</html>