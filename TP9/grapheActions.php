<?php
include 'connexpdo.php';

$dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=grapheactions';
$user = 'postgres';
$password = 'password';

$dbh = connexpdo($dsn,$user,$password);

$sql = "SELECT * FROM statistique WHERE action LIKE 'Als'";
$rst1 = $dbh->query($sql);
$nbActionAls = 0;
$actionAls = array();
foreach ($rst1 as $action) {
    $nbActionAls++;
    array_push($actionAls,$action["valeur"]);
}

$sql2 = "SELECT * FROM statistique WHERE action LIKE 'For'";
$rst2 = $dbh->query($sql2);
$nbActionFor = 0;
$actionFor = array();
foreach ($rst2 as $action) {
    $nbActionFor++;
    array_push($actionFor,$action["valeur"]);
}

header ("Content-type: image/png");
$image = imagecreate(500,500);

$noir = imagecolorallocate($image, 0, 0, 0);
$grey = imagecolorallocate($image, 128, 128, 128);
$red = imagecolorallocate($image, 255, 0, 0);
$green = imagecolorallocate($image, 0, 255, 0);
$blanc = imagecolorallocate($image, 255, 255, 255);

imagefilledrectangle($image,1,1,499,499,$grey);
$y1= 500-5*$actionAls[0];
for($i=1;$i<$nbActionAls;$i++){
    $y2 = 500-5*$actionAls[$i];
    imageline($image,($i-1)*40,$y1,$i*40,$y2,$blanc);
    $y1 = $y2;
}
$y1= 500-5*$actionFor[0];
for($i=1;$i<$nbActionFor;$i++){
    $y2 = 500-5*$actionFor[$i];
    imageline($image,($i-1)*40,$y1,$i*40,$y2,$red);
    $y1 = $y2;
}

imagestring($image, 5, 10, 10, "Calcul des actions Als", $green);
imagestring($image, 5, 10, 25, "et For en 2010", $green);
imagestring($image,5,50,475,"For",$red);
imagestring($image,5,75,475,"Als",$blanc);

imagepng($image);
?>