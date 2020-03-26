<?php

include "../TP6/Formulaire.php";

class Form2 extends Formulaire{
    function __construct($fichier, $methode){
        parent::__construct($fichier, $methode);
    }
    function ajouterBoutonRadio($texte){
        $boutonRad = $texte."<input type='radio' name='radio' value='".$texte."'/><br>";
        $pos = strrpos($this->formulaire,"<",-1);
        $part1 =  substr($this->formulaire,0,$pos);
        $part2 = substr($this->formulaire,$pos);
        $this->formulaire = $part1.$boutonRad.$part2;
    }
    function ajouterCaseCocher($texte){
        $checkBox = $texte."<input type='checkbox' name='check' value='".$texte."'/><br>";
        $pos = strrpos($this->formulaire,"<",-1);
        $part1 =  substr($this->formulaire,0,$pos);
        $part2 = substr($this->formulaire,$pos);
        $this->formulaire = $part1.$checkBox.$part2;
    }
}

$form = new Form2("testFormulaire","post");
$form->ajouterZoneTexte("Votre nom");
$form->ajouterZoneTexte("Votre code");
$form->ajouterBouton();
$form->ajouterBoutonRadio("Homme");
$form->ajouterBoutonRadio("Femme");
$form->ajouterCaseCocher("Tennis");
$form->ajouterCaseCocher("Equitation");
echo $form->getForm();