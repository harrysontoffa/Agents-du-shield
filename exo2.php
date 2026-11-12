<?php

// exo 1

 
$operation = readline("quelle opération souhaitez vous effectuer? \t");
$firstArg = readline("premier chiffre ? \t");
$scndArg = readline("second chiffe?\t");

function addition(int |float  $a, int | float $b){
 return "$a + $b = " . ($a+$b) ."\n";
};
function soustraction(int |float  $a, int | float $b){
    if($a>$b)
  return "$a - $b = " . ($a-$b)."\n";
 else if($b>$a)
    return "$b - $a = " . ($b-$a)."\n";
};
function multiplication(int |float  $a, int | float $b){
 return "$a * $b = " . ($a*$b)."\n";
};
function division(int |float  $a, int | float $b){
    if($b>0)
 return "$a / $b = " . ($a/$b)."\n" ;
 else if($b==0) return "vous ne pouvez pas diviser un nombre par 0 ";
};

switch($operation){
    case "addition":
        echo addition($firstArg,$scndArg);
        break;
    case "soustraction":
        echo soustraction($firstArg,$scndArg);
        break;
    case "multiplication":
        echo multiplication($firstArg,$scndArg);
        break;
    case "division": 
        echo division($firstArg,$scndArg);
        break;
    default: 
        echo "autre valeur";
        break;
};
// exo 2
$prixUnitaire = readline("entrez le prix unitaire\t");
$quantite= readline("quantite choisit\t");


 function calculTTC(int|float $prixHT , int $qtt){
    return "prix TTC =".$prixHT *$qtt*(1+20/100) ;
 }


 echo calculTTC($prixUnitaire, $quantite) . "\n";

 // exo 3

 $age = readline("quel est vore age? \t");

 function is_majeur(int $a){
    if($a>=18) return "vous êtes majeur\n";
    else return "vous êtes mineur\n";
 }
 echo is_majeur($age);

 // exo 4 
 $nom = readline("votre nom?\t");
 $prenom = readline("votre prenom\t");

 function intiales(string $nom , string $prenom){
    return "vos initiales: " .ucfirst($nom[0]). "." .ucfirst($prenom[0])  . "\n" ;
 }

 echo intiales($nom, $prenom). "\n";

 // exo 5

 function formatterNom(string $nom, string $prenom){
    return "$prenom". " ". strtoupper($nom) . "\n";
 }

 echo formatterNom($nom, $prenom) ."\n";