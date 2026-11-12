<?php
session_start();
include 'vendor/autoload.php';
include_once 'database.php';

function verify_user_existe()
{
    
    try {
        // se connecter a la bdd
        $bdd = connect_bdd();

        $sql = "SELECT users.id_User , users.email , users.password, users.firstname, users.lastname , users.id_Role FROM `users` 
        WHERE users.email = ?
        ORDER BY users.id_User";

        // preparation de la requette
        $stmt = $bdd->prepare($sql);

        $email= $_POST["email"];
        $stmt->bindParam(1,$email,PDO::PARAM_STR);
        $stmt->execute();

        // Récupérer l'utilisateur
        $utilisateur = $stmt->fetch();


        return $utilisateur;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
$msg = "";

function connexion()
{
    global $msg;
    if (isset($_POST["submit"])) {
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            $msg = "tous les champs ne sont pas remplis";
        } else {
            if (!str_contains($_POST["email"], "@")) {
                $msg = "vote email est invalide ";
            } else {
                try {
                    $curentUser = verify_user_existe();
                    if (!$curentUser) {
                        $msg= 'utilisateur inexistant';
                        return;
                    }
                    // $id = $curentUser['id_User'];
                    $userName =$curentUser['firstname'] . ' ' . $curentUser['lastname'];
                    $email = $curentUser['email'];
                    $passWordSaisi =$_POST['password'];
                    $passwordUserHashed = $curentUser['password'];
                    if(password_verify($passWordSaisi,$passwordUserHashed) && $_POST["email"] == $email ){
                        $msg = "Identifiants valide . vous êtes connectée bienvenue $userName";
                        $_SESSION["curentUser"]= $curentUser;
                        header('Location:Acceuil.php');
                    
                    } else {
                        $msg = "identifients incorrecte";
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

               
            }
        }
    }
}


connexion();

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
    <form method="POST">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="password" placeholder="password">
        <button type="submit" name="submit">envoyer</button>
    </form>
    <p><?php echo $msg; ?></p>

</body>

</html>