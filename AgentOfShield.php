<?php
session_start();

include 'vendor/autoload.php';
include_once 'database.php';

if (empty($_SESSION["curentUser"]) || $_SESSION["curentUser"]['id_Role'] != 2) {
    header("Location: connexion.php");
    exit;
}

function get_all_archetype(){
 try {
    
    $bdd = connect_bdd();
    $sql = "SELECT archetypes.archetype , archetypes.id_Archetype
     FROM archetypes
     ORDER BY  archetypes.id_Archetype";

     $stmt= $bdd->prepare($sql);
     $stmt->execute();
     $tousLesArchetypes= $stmt->fetchAll();
     return $tousLesArchetypes;
 } catch (PDOException $e){
    echo $e->getMessage(); 
    return [];
 }
}


function get_all_tiers(){
 try {
    
    $bdd = connect_bdd();
    $sql = "SELECT tiers.id_Tier , tiers.tier, tiers.level
     FROM tiers
     ORDER BY  tiers.id_Tier";

     $stmt= $bdd->prepare($sql);
     $stmt->execute();
     $tousLesTiers= $stmt->fetchAll();
     return $tousLesTiers;
 } catch (PDOException $e){
    echo $e->getMessage(); 
    return [];
 }
}

function get_all_team(){
 try {
    
    $bdd = connect_bdd();
    $sql = "SELECT teams.id_Team , teams.team_name, teams.id_User
     FROM teams
     ORDER BY  teams.id_Team";

     $stmt= $bdd->prepare($sql);
     $stmt->execute();
     $toutesLesTeams= $stmt->fetchAll();
     return $toutesLesTeams;
 } catch (PDOException $e){
    echo $e->getMessage(); 
    return [];
 }
}

$liste_archetypes = get_all_archetype();
$liste_tiers = get_all_tiers();
$liste_teams = get_all_team();






 function createAgent(){

$msg="";
if(isset($_POST["submit"])){
    if(empty($_POST["nom"])|| empty($_POST["dateOfBirth"])||empty($_POST["id_Archetype"])||empty($_POST["id_Tier"])||empty($_POST["id_Team"])){
        $msg="Tous les champs ne sont pas remplis";
    } else {
       if(strlen($_POST["nom"]) <3){
        $msg="Votre nom doit contenir minimum 3 caractères";
       } else {
         $aujourdhui =new DateTime();
        $naissance = new DateTime(($_POST["dateOfBirth"]));
        $age=$aujourdhui->diff($naissance)->y;
        if($age<18){
            $msg="Vous devez avoir minimum 18 ans ";
        } else{
            try{
                $bdd = connect_bdd();
                $sql = "INSERT INTO agents (`name`, dob, id_Archetype, id_Tier , id_Team)
                VALUES (?,?,?,?,?)";
                $stmt = $bdd->prepare($sql);
                $nom=$_POST["nom"];
                $dob=$_POST["dateOfBirth"];
                $archetypeChoisit= $_POST["id_Archetype"];
                $tiersChoisit=$_POST["id_Tier"];
                $teamChoisit=$_POST["id_Team"];

                $stmt->bindParam(1,$nom,PDO::PARAM_STR);
                $stmt->bindParam(2,$dob,PDO::PARAM_STR);
                $stmt->bindParam(3,$archetypeChoisit,PDO::PARAM_INT);
                $stmt->bindParam(4,$tiersChoisit,PDO::PARAM_INT);
                $stmt->bindParam(5,$teamChoisit,PDO::PARAM_INT);

                $stmt->execute();
                $msg= "agent crée avec sucess";
                sleep(3);
                $msg= " ";
                

            } catch (PDOException $e){
                $msg= $e->getMessage();
            }
        }
       }
    }
}
}
createAgent();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un agent</title>
</head>
<body>

    <form method="POST">

        <input type="text" name="nom" placeholder="Nom">

        <input type="date" name="dateOfBirth" placeholder="Date of birth">

        <select name="id_Archetype">
            <option value="">-- Archétype --</option>
            <?php foreach ($liste_archetypes as $archetype): ?>
                <option value="<?= htmlspecialchars($archetype['id_Archetype']); ?>">
                    <?= htmlspecialchars($archetype['archetype']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select name="id_Tier">
            <option value="">-- Tier --</option>
            <?php foreach ($liste_tiers as $tier): ?>
                <option value="<?= htmlspecialchars($tier['id_Tier']); ?>">
                    <?= htmlspecialchars($tier['tier']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select name="id_Team">
            <option value="">-- Team --</option>
            <?php foreach ($liste_teams as $team): ?>
                <option value="<?= htmlspecialchars($team['id_Team']); ?>">
                    <?= htmlspecialchars($team['team_name']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" name="submit">Créer l'agent</button>

    </form>
    <p><?php echo $msg; ?></p>

</body>
</html>


 