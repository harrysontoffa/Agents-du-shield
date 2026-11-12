<?php 

 //exo1
$a=1;
while ($a<=10){
    echo $a++ ."\n";
};

//exo2
echo "exo2: compte a rebour\n ";
$b=20;
while ($b>=0){
    echo $b-- ."\n";
}
//exo3
$password="php2026";



do {
    $input = readline("password ???\t");
} while ($input !== $password) ;
echo "connexion réussie";

// exo 4
 
for ($c=0;$c<=10;$c++){
    echo "7 x $c = " .(7*$c)."\n";
}

// exo 5
$somme = 0;
for($d=1;$d<=100;$d++){
    $somme = $somme + $d ;
}
echo $somme;

// exo 6

for($nbr=0;$nbr<=50;$nbr++){
    if($nbr%2==0){
        echo "$nbr"."\n";
    }
}

// exo 7

for($star=0;$star<=5;$star++){
    if($star==1) echo "*\n";
    if($star==2) echo "**\n";
    if($star==3) echo "***\n";
    if($star==4) echo "****\n";
    if($star==5) echo "*****\n";
    if($star==6) echo "******\n";
     
};
// exo 8

$fruits = [
    "Pomme",
    "Poire",
    "Banane",
    "Orange",
    "Kiwi"
];
echo $fruits[0];
echo $fruits[count($fruits)-1];
echo "la liste de fruit contient " . count($fruits) . " elements\n";

for($x=0;$x<count($fruits);$x++){
    echo $fruits[$x] . "\n";
};

//exo 9
$somme1=0;

$notes = [12, 15, 8, 19, 17]; 
for($x=0; $x<count($fruits); $x++){
    $somme1 = $somme1 + $notes[$x];
}
$moyenne = $somme1/count($notes);
echo "la somme = " . $somme1 . "\n";

echo "la moyenne = " . $moyenne . "\n";
// exo 10 

$personne = [
    "firstname" => "Alice",
    "lastname" => "Martin",
    "age" => 28,
    "city" => "Bordeaux"
];

echo "prénom: ". $personne["firstname"] ."\n";
echo "nom: ". $personne["lastname"] ."\n";
echo "age: ". $personne["age"] ." ans\n";
echo "ville: ". $personne["city"] ."\n";

// exo 11
for($x=0;$x<count($fruits);$x++){
    echo "j'aime les " . $fruits[$x] . "\n";
}
//exo 12 
 foreach ($personne as $cle=> $value){
    echo $cle ." : " . $value . "\n";
 }

// exo 13
 $tab = [12,3,22,6,47,89,1,187,2,26,44,22,47,1];

 $max=$tab[0];

 foreach($tab as $elmt){
    if($elmt>=$max) $max=$elmt;
 }
 
 echo "le plus grand element est: " . $max . "\n";

 // exo 14
 
 function moyenne(array $tab){
    for($x=0;$x<count($tab);$x++){
     return array_sum($tab) / count($tab);
    };
    
 };

 echo  "moyenne= ".moyenne($tab). "\n";



// exo 16
$devineNbr = 3;
$tentatives = 0;

$nbrInput= (int)readline("entrez le nombre a deviner ");
while($nbrInput!==$devineNbr &&$tentatives<9){
     
        $nbrInput= (int)readline("entrez le nombre a deviner ");
        $tentatives ++;
     
};

// exo 17

$products = [
    [
        "name" => "Clavier",
        "price" => 49.99,
        "stock" => 12
    ],
    [
        "name" => "Souris",
        "price" => 19.90,
        "stock" => 0
    ],
    [
        "name" => "Écran",
        "price" => 189.00,
        "stock" => 5
    ]
];

for($x=0; $x<count($products);$x++){
    $name = $products[$x]["name"];
    $prix = $products[$x]["price"];
    $stock = $products[$x]["stock"];
    
    if($stock==0){
        $stock="rupture";
    } else $stock = "En stock";

    echo $name . "=>" . $prix . "=>" . $stock . "\n";
};



