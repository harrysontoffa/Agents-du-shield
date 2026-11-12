<?php 
$resultat ="";

if(isset($_POST["submit"])){
    if(!empty($_POST["nbr1"]) &&
         ($_POST["nbr2"]) !== ""&&
        !empty($_POST["operateur"])
        ){
            if(is_numeric($_POST["nbr1"]) &&
               is_numeric($_POST["nbr2"]) &&
               is_string($_POST["operateur"])
                ){
                    if($_POST["operateur"]=="add"){
                        $addition=  $_POST["nbr1"] + $_POST["nbr2"] ;
                        $a = $_POST["nbr1"];
                        $b = $_POST["nbr2"];
                        $resultat = "$a + $b = $addition"   ;
                    }
                    else if($_POST["operateur"]=="sous"){
                        if($_POST["nbr1"]<$_POST["nbr2"]){
                            $soustraction=  $_POST["nbr2"] - $_POST["nbr1"] ;
                            $a = $_POST["nbr1"];
                            $b = $_POST["nbr2"];
                        $resultat = "$b - $a = $soustraction"   ;
                        }
                        else { 
                        $soustraction=  $_POST["nbr1"] - $_POST["nbr2"] ;
                        $a = $_POST["nbr1"];
                        $b = $_POST["nbr2"];
                        $resultat = "$a - $b = $soustraction"   ;}
                    }
                    else if($_POST["operateur"]=="multi"){
                        $multiplication=  $_POST["nbr1"] * $_POST["nbr2"] ;
                        $a = $_POST["nbr1"];
                        $b = $_POST["nbr2"];
                        $resultat = "$a * $b = $multiplication"   ;
                    }
                    else if($_POST["operateur"]=="div"){
                        if((int)$_POST["nbr2"] == 0){$resultat="vous ne pouvez pas divisez un nombre par zero";}
                        else { 
                        $division=  $_POST["nbr1"] / $_POST["nbr2"] ;
                        $a = $_POST["nbr1"];
                        $b = $_POST["nbr2"];
                        $resultat = "$a / $b = $division"   ;}
                    }
                    else if($_POST["operateur"] !=="add" ||
                     $_POST["operateur"] !=="sous" || 
                     $_POST["operateur"] !=="div" ||
                     $_POST["operateur"] !=="multi"){
                        $resultat= "l'opérateur choisit n'existe pas";
                     }
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
            <input type="text" name="nbr1" placeholder="entrez le premier nombre ">
            <input type="text" name="nbr2" placeholder="entrez le second nombre ">
            <select name="operateur">
                <option value="">-- Choisissez un opérateur --</option>
                <option value="add">Addition (+)</option>
                <option value="sous">Soustraction (-)</option>
                <option value="multi">Multiplication (*)</option>
                <option value="div">Division (/)</option>
            </select>
            <input type="submit" value="envoyer" name="submit">
        </form>
        <p><?php echo $resultat; ?></p>
        
    </body>

</html>
