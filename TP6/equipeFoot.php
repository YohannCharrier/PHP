<?php
class equipeFoot
{
    const TEXT = "Nombre d'équipe :";
    public static $nbEquipe = 0;
    private $nom;
    private $nbTitre;

    function __construct($name,$nb){
        $this->setTitre($nb);
        $this->setNom($name);
        self::$nbEquipe++;
    }
    function __destruct(){
        echo "Destructor<br>";
        self::$nbEquipe--;
    }

    function display(){
        echo "L'équipe ".$this->nom." a ".$this->nbTitre." de titres<br>";
    }
    static function printEquipe(){
        echo self::TEXT." ".self::$nbEquipe."<br>";
    }
    function setNom($name){
        $this->nom = $name;
    }
    function setTitre($nb){
        $this->nbTitre = $nb;
    }
    function getNom(){
        return $this->nom;
    }
    function getTitre(){
        return $this->nbTitre;
    }
}
$e1 = new equipeFoot("FC Nantes",8);
$e2 = new equipeFoot("Rennes",0);
$e3 = new equipeFoot("ASSE",10);
$e4 = new equipeFoot("OL",8);
$e1::printEquipe();

