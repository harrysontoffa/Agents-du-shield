<?php
session_start();
 
// Page protégée : si personne n'est connecté, retour à la connexion
if (empty($_SESSION["curentUser"])) {
    header("Location: connexion.php");
    exit;
}

// Empêche le navigateur de garder la page en cache (bouton "retour" après déconnexion)
header("Cache-Control: no-store, no-cache, must-revalidate");

include 'vendor/autoload.php';
include_once 'database.php';


function get_all_users()
{
    
    try {
        // se connecter a la bdd
        $bdd = connect_bdd();

        $sql = "SELECT users.id_User , users.email , users.password, users.firstname, users.lastname , users.id_Role 
        FROM `users` 
    
        ORDER BY users.id_User";

        // preparation de la requette
        $stmt = $bdd->prepare($sql);

        // Exécuter la requête
        $stmt->execute();

        // Récupérer l'utilisateur
        $tousLesutilisateur = $stmt->fetchAll();


        return $tousLesutilisateur;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return [];
    }
}

$liste_users = get_all_users();
// print_r($liste_users[1]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
</head>
<body>
    
<main class="users-container">

    <h1>Liste des utilisateurs</h1>
    <button onclick="window.location.href='Profile.php';">Mon Profile</button>
    <button onclick="window.location.href='deconnexion.php';">Déconnexion</button>
    <button onclick="window.location.href='AgentOfShield.php';">Agent of shield</button>
    <button onclick="window.location.href='AgentsArchieve.php';">Agent Archives</button>
    <p class="subtitle">Gestion des comptes utilisateurs</p>

    <div class="users-list">

        <?php foreach ($liste_users as $user): ?>

            <div class="user-card">

                <div class="user-id">
                    #<?= htmlspecialchars($user['id_User']); ?>
                </div>

                <div class="user-info">

                    <div class="info-item">
                        <span class="info-label">Nom</span>
                        <p><?= htmlspecialchars($user['lastname']); ?></p>
                    </div>

                    <div class="info-item">
                        <span class="info-label">Prénom</span>
                        <p><?= htmlspecialchars($user['firstname']); ?></p>
                    </div>

                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <p><?= htmlspecialchars($user['email']); ?></p>
                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</main>

</body>
</html>