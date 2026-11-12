<?php


include 'vendor/autoload.php';
include_once 'database.php';

function verify_user_existe()
{
    try {
        // se connecter a la bdd
        $bdd = connect_bdd();

        $sql = "SELECT users.id_User , users.email  FROM `users` 
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




function create_user()
{
    try {
        $utilisateur = verify_user_existe();

        if ($utilisateur) {
            echo "un utilisateur avec cet email existe deja";
            // print_r($utilisateur);
        } else {

            try {
                // se connecter a la bdd
                $bdd = connect_bdd();

                $sql = "INSERT INTO `users` (firstname, lastname, email, `password`, id_Role )
                VALUES (?, ?, ?, ?, ?)";

                // preparation de la requette
                $stmt = $bdd->prepare($sql);
                $nom=$_POST["nom"];
                $prenom = $_POST["prenom"];
                $email= $_POST["email"];
                $passwordSaisi = $_POST['password'];
                $passwordHashe = password_hash($passwordSaisi, PASSWORD_DEFAULT);
                $id_Role=2;

                $stmt->bindParam(1,$nom,PDO::PARAM_STR);
                $stmt->bindParam(2,$prenom,PDO::PARAM_STR);
                $stmt->bindParam(3,$email,PDO::PARAM_STR);
                $stmt->bindParam(4,$passwordHashe,PDO::PARAM_STR);
                $stmt->bindParam(5,$id_Role,PDO::PARAM_STR);

                $stmt->execute();

                echo "user crée avec sucess";

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
$msg = "";
const REGEX_PASSWORD = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
const REGEX_NOMPRENOM = '/^[a-zA-ZÀ-ÿ\s-]{2,}$/';

if (isset($_POST["submit"])) {
    if (empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confPassword"]) || empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["dateNaissance"])) {
        $msg = "tous les champs ne sont pas remplis";
    } else {
        if (!preg_match(REGEX_NOMPRENOM, $_POST["nom"]) || !preg_match(REGEX_NOMPRENOM, $_POST["prenom"])) {
            $msg = "le nom et le preom doivent contenir minimum 2 caractères";
        } else {
            if (!str_contains($_POST["email"], "@")) {
                $msg = "vote email est invalide ";
            } else {
                if (!preg_match(REGEX_PASSWORD, $_POST["password"])) {
                    $msg = "Le mot de passe doit contenir au moins 8 caractères, avec au moins une majuscule, une minuscule et un chiffre.";
                } else {
                    if ($_POST["password"] !== $_POST["confPassword"]) {
                        $msg = "les deux mots de passe doivent être identique";
                    } else {
                        $aujourdhui = new DateTime();
                        $naissance =   new DateTime($_POST["dateNaissance"]);
                        $age = $aujourdhui->diff($naissance)->y;
                        if ($age < 18) {
                            $msg = "Vous devez avoir minumum 18 ans";
                        } else {
                            create_user();
                            $msg = "votre compte a été créée";
                            header('Location:connexion.php');
                        }
                    }
                }
            }
        }
    }
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
    <form method="POST">
        <input type="text" name="nom" placeholder="nom">
        <input type="text" name="prenom" placeholder="prenom">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="password" placeholder="password">
        <input type="text" name="confPassword" placeholder="confirmation password">
        <input type="date" name="dateNaissance" placeholder="date de naissance">
        <button type="submit" name="submit">envoyer</button>
    </form>
    <p><?php echo $msg; ?></p>
</body>

</html>