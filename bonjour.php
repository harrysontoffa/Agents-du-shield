<?php 
//exo1
echo "Bonjour le monde \n";
echo "Bienvenue dans le cours PHP \n";
// exo2
$prenom = 'harryson';
$nom= 'toffa';
$âge= 20;
$ville = 'tououse';

echo "je m'apelle $prenom $nom\n";
echo "J'ai $âge ans \n";
echo "j'habite à $ville\n";

// exo 3

const PI = 3.14159;
const TVA = 20;

echo "valeur de PI : ". PI ."\n";
echo "TVA : ". TVA ."%\n";

//exo 4
$prixHt = 12;
$nombreArticle = 3;
$tauxTVA = 20;
echo "le prix hors taxe de l'article est $prixHt €, et est contenue $nombreArticle fois dans le panier, Pour un taux de TVA de $tauxTVA% \n";

$prixTTC = $prixHt * $nombreArticle * (1+$tauxTVA/100);
echo "prix TTC pour cet article est de $prixTTC € \n";


// exo 5

$prenom =readline("quel est votre prénom: \t");
echo"Bonjour $prenom ! \n";

//exo 6
$age = readline("quel âge avez vous ? \n");
echo"Vous avez $age ans \n";
echo "l'année prochaine vous aurez "  .($age +1). "ans\n ";

// exo 7
$nombre = readline("Veuillez entrer un nombre \t");
 function parite(int $nbr): string{
    

    if($nbr % 2 ==0){
        return "Votre nombre est pair";
    } else {
        return "votre nombre est impaire";
    }
 };

echo "" . parite($nombre) . "\n";

// exo 8 

$ageInput= readline("Veuillez entrer votre âge \t");

function isMajeur(int $age): string{
    if($age <18){
        return "Vous êtes mineur";
    } else {
        return "vous êtes Majeur";
    }
}
echo "" . isMajeur($ageInput) . "\n";

