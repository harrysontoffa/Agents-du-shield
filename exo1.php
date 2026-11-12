<?php
// exo date

include './vendor/autoload.php';

$dateNaissance = readline("donnes votre date de naissance au format 'aaaa/mm/dd' \t");

$date = new DateTime($dateNaissance);

echo "$date";