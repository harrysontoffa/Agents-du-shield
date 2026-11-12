<?php
// test le form est soumis
$msg="";
if (isset($_POST["submit"])) {
    if (
        !empty($_POST["prixHT"]) &&
        !empty($_POST["quantite"]) &&
        !empty($_POST["TVA"])
    ) { if(is_numeric($_POST["prixHT"]) && 
        is_numeric($_POST["quantite"]) && 
        is_numeric($_POST["TVA"]))
        {
        $prixTTC = $_POST["prixHT"] * $_POST["quantite"] * ($_POST["TVA"]/100);
        $msg="Le prix TTC est égal à : " . "$prixTTC" . "€";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    </head>
    <body>
        <form method="POST"  > 
            <input type="number" name="prixHT" placeholder="prix HT de l'article">
            <input type="number" name="quantite" placeholder="nombre article">
            <input type="number" name="TVA" placeholder="taux TVA">
            <input type="submit" value="envoyer" name="submit">
        </form>
        <p><?php echo $msg; ?></p>
    </body>

</html>

