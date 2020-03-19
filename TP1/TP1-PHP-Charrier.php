<h1>TP1 : Variables et constantes</h1>
<hr>
<h2>Exercice1</h2>
<h3>Question1</h3>
<?php
echo '1 - le livre "ma vie" est terrible !!'."<br>";
echo "2 - le livre \"ma vie\" est terrible !! <br>";
echo '3 - le livre "ma vie" est terrible !! <br>';
echo '4 - le livre "ma vie" est terrible !! et le public
l\'apprécie<br><br>';
$mavie = "ma vie";
echo "5 - le livre $mavie est terrible !! <br>";
echo '6 - le livre $mavie est terrible !! <br>';
?>
<hr>
<h2>Exercice2</h2>
<h3>Question1</h3>
<?php
echo "J'ai l'esprit large et je n'admets pas qu'on dise le contraire. Citation de Coluche <br>";
?>
<h3>Question2</h3>
<?php
echo "<i>J'ai l'esprit large et je n'admets pas qu'on dise le contraire.</i> Citation de Coluche <br>";
?>
<h3>Question3</h3>
<?php
echo "J'ai l'esprit large et je n'admets pas qu'on dise le contraire. <b>Citation de Coluche</b> <br>";
?>
<h3>Question4</h3>
<?php
echo "J'ai l'esprit large et je n'admets pas qu'on dise le contraire. ".strtoupper("Citation de Coluche")."<br>";
?>
<hr>
<h2>Exercice3</h2>
<h3>Question1</h3>
<?php
$citation = "J'ai l'esprit large et je n'admets pas qu'on dise le contraire. ";
$auteur = "Citation de Coluche";
echo "$citation $auteur";
?>
<h3>Question2</h3>
<?php
$citation1;
$auteur1;
var_dump(isset($citation1));
var_dump(isset($auteur1));
$citation1 = "\nJ'ai l'esprit large et je n'admets pas qu'on dise le contraire. ";
$auteur1 = "Citation de Coluche\n";
echo "$citation1 $auteur1";
var_dump(isset($citation1));
var_dump(isset($auteur1));
?>
<h3>Question3</h3>
<?php
$citation2;
define('AUTEUR',"Citation de Coluche\n");
var_dump(isset($citation2));
$citation2 = "\nJ'ai l'esprit large et je n'admets pas qu'on dise le contraire. ";
echo "$citation2 ".AUTEUR;
var_dump(isset($citation2));
?>
<h3>Question4</h3>
<?php
$citation3;
$auteur3;
var_dump(isset($citation3));
var_dump(isset($auteur3));
$citation3 = "\nJ'ai l'esprit large et je n'admets pas qu'on dise le contraire. ";
$auteur3 = "Citation de Coluche\n";
echo "$citation3 $auteur3";
var_dump(isset($citation3));
var_dump(isset($auteur3));
unset($citation3);
unset($auteur3);
var_dump(isset($citation3));
var_dump(isset($auteur3));
?>
<hr>
<h2>Exercice4</h2>
<?php
echo "$_SERVER  $GLOBALS";
?>
<hr>
<h2>Exercice5</h2>
<?php
ini_set('display_errors',"on");
echo ini_get('display_errors');
//echo phpinfo();
?>
