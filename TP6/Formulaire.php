<?php

class Formulaire {
    protected $formulaire;
    function __construct($fichier,$methode) {
        $this->formulaire = "<form action='".$fichier.".php' method='".$methode."'></form>";
    }
    function ajouterZoneTexte($texte){
        $zoneTexte = $texte." : <input type='text' name='".$texte."'><br>";
        $pos = strrpos($this->formulaire,"<",-1);
        $part1 =  substr($this->formulaire,0,$pos);
        $part2 = substr($this->formulaire,$pos);
        $this->formulaire = $part1.$zoneTexte.$part2;
    }
    function ajouterBouton(){
        $bouton = "<input type='submit'value='Valider'/><br>";
        $pos = strrpos($this->formulaire,"<",-1);
        $part1 =  substr($this->formulaire,0,$pos);
        $part2 = substr($this->formulaire,$pos);
        $this->formulaire = $part1.$bouton.$part2;
    }
    function getForm(){
        return $this->formulaire;
    }
}
