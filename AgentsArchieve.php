<?php

session_start();
 
// Page protégée : si personne n'est connecté, retour à la connexion
if (empty($_SESSION["curentUser"])|| $_SESSION["curentUser"]['id_Role'] != 2) {
    header("Location: connexion.php");
    exit;
}

// Empêche le navigateur de garder la page en cache (bouton "retour" après déconnexion)
header("Cache-Control: no-store, no-cache, must-revalidate");

include 'vendor/autoload.php';
include_once 'database.php';

function get_agents()
{
    
    try {
        // se connecter a la bdd
        $bdd = connect_bdd();

        $sql = "SELECT * FROM vue_agents_resume;";

        // preparation de la requette
        $stmt = $bdd->prepare($sql);

         
         
        $stmt->execute();

        // Récupérer l'utilisateur
        $ViewAgents = $stmt->fetchAll();


        return $ViewAgents;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
$listeAgents = get_agents();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="agents-list" >
    <?php foreach($listeAgents as $agent): ?>
    
        <div class="agent-id">
             #<?= htmlspecialchars($agent['Id_Agent']); ?>
        </div>
        <div class="agent-id">
             #<?= htmlspecialchars($agent['agent_name']); ?>
        </div>
        <div class="agent-id">
             #<?= htmlspecialchars($agent['dob']); ?>
        </div>
        <div class="agent-id">
             #<?= htmlspecialchars($agent['archetype']); ?>
        </div>
        <div class="agent-id">
             #<?= htmlspecialchars($agent['abilities']); ?>
        </div>
   
    <?php endforeach; ?>
     </div>
    
</body>
</html>