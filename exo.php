<?php
// exo 18

$prenom= readline("votre prénom?\t ");
$nom=readline("votre nom?\t");
echo "vous etes ".strtoupper($prenom) ." ". strtoupper($nom) . " votre prenom contient " . strlen($prenom) ." lettres \n"  ;

// exo 19 

$email = readline("votre email? \t");

if(str_contains($email, '@')){
    echo "email valide\n";
} else {
    echo "email invalide \n";
};

// exo 20

const PASSWORD = "php2026";

$inputPassword = readline("entrez votre mots de passe\t");

if($inputPassword === PASSWORD){
    echo "passsword vailde\n";
} else {
    echo "password invalide \n";
}
// exo 21 
$prenom = readline("votre prenom svp ? \t");

echo "Bonjour ".trim($prenom) ." ";

