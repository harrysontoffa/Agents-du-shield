<?php


class Des {
    public function __construct(public int $nbrface, public int $score=0){}

    public function lancer(){
        $this->score=   random_int(1,$this->nbrface);
        return $this->score;
    }
}
class Joueur {
    public function __construct(public string $nom, public int $valeurLance = 0, public Des $des){}

    public function lancerDes(){
        $this->valeurLance = $this->des->lancer();
        return $this->valeurLance;
    }
}

$monDes = new Des (6);

$joueur1 = new Joueur('harry',0,$monDes);
$joueur2 = new Joueur('jenny',0,$monDes);


// echo $joueur1->valeurLance . "\n"; 
// $joueur1->lancerDes() ;
// echo $joueur1->valeurLance . "\n";
// $joueur1->lancerDes();
// echo $joueur1->valeurLance . "\n";

class Partie {
    public function __construct(public Joueur $joueur1, public Joueur $joueur2, public int $nbrTour, public int $scoreJ1=0, public int $scoreJ2=0 ){

    }

    public function lancerPartie(){
        for($i=1;$i<=$this->nbrTour;$i++){
            echo $this->joueur1->nom ."lance pour le tour ". $i."\n"; 
            $this->joueur1->lancerDes() ;
            echo $this->joueur1->valeurLance . "\n";
            echo $this->joueur2->nom ."lance pour le tour ". $i."\n";
            $this->joueur2->lancerDes();
            echo $this->joueur2->valeurLance ."\n";

            if(($this->joueur1->valeurLance)>($this->joueur2->valeurLance)){
                  $this->scoreJ1+=1;

            }
            else if(($this->joueur1->valeurLance)<($this->joueur2->valeurLance)){
                  $this->scoreJ2+=1;
            }
             
            

        }
        if(($this->scoreJ1)<($this->scoreJ2)){
            return $this->joueur2->nom . " à gagner \n";
            }
        else if(($this->scoreJ1)>($this->scoreJ2)) {return $this->joueur1->nom . " à gagner \n";}
        else {
            return "Match nul ! Pas de gagnant. \n";
        }
         
        
    }

}

$game= new Partie($joueur1,$joueur2,5);

// echo $game->scoreJ1 . "\n";
echo $game->lancerPartie();

