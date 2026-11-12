<?php
include 'vendor/autoload.php';
include_once 'database.php';
 

try {
    // se connecter a la bdd
    $bdd = connect_bdd();
    $sql =  "SELECT u.id_user AS id, u.firstname AS prenom, u.lastname AS nom, u.email AS mail FROM `user` AS u
    WHERE u.email = ?
    ORDER BY u.id_user";
    // preparation de la requette 
    $stmt = $bdd->prepare($sql);
    // 3. Exécuter la requête en remplaçant le '?' par l'email voulu
    $emailRecherche = 'toffaharryson3@gmail.com';
    $stmt->execute([$emailRecherche]);
    // On utilise fetch() car un email est unique, on ne recevra qu'un seul utilisateur
    $utilisateur = $stmt->fetch();
    print_r($utilisateur);

    //ass
    
} catch (PDOException $e) {
    echo $e->getMessage();

}
