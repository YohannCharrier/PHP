<?php
include 'Formulaire.php';

$form = new Formulaire("testFormulaire","post");
$form->ajouterZoneTexte("Votre nom");
$form->ajouterZoneTexte("Votre code");
$form->ajouterBouton();
echo $form->getForm();
