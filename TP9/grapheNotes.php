<?php
include 'connexpdo.php';

$dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=graphenotes';
$user = 'postgres';
$password = 'password';

$dbh = connexpdo($dsn,$user,$password);

$sql = "SELECT * FROM notes WHERE etudiant LIKE 'E1'";
$rst1 = $dbh->query($sql);
$moyE1 = 0;
$nbNoteE1 = 0;
$noteE1 = array();
foreach ($rst1 as $note) {
    $moyE1 += $note["note"];
    array_push($noteE1,$note["note"]);
    $nbNoteE1++;
}
$moyE1 /= $nbNoteE1;

$sql2 = "SELECT * FROM notes WHERE etudiant LIKE 'E2'";
$rst2 = $dbh->query($sql2);
$moyE2 = 0;
$nbNoteE2 = 0;
$noteE2 = array();
foreach ($rst2 as $note) {
    $moyE2 += $note["note"];
    array_push($noteE2,$note["note"]);
    $nbNoteE2++;
}
$moyE2 /= $nbNoteE2;

header ("Content-type: image/png");
$image = imagecreate(750,200);

$noir = imagecolorallocate($image, 0, 0, 0);
$grey = imagecolorallocate($image, 128, 128, 128);
$bleu = imagecolorallocate($image, 0, 0, 255);
$bleuclair = imagecolorallocate($image, 156, 227, 254);
$blanc = imagecolorallocate($image, 255, 255, 255);

imagefilledrectangle($image,1,1,749,199,$grey);
$y1=150 - (5*$noteE1[0]);
for($i=1;$i<$nbNoteE1;$i++){
    $y2 = 150 - (5*$noteE1[$i]);
    imageline($image,50+($i-1)*65,$y1,50+$i*65,$y2,$blanc);
    $y1 = $y2;
}
$y1=150 - (5*$noteE2[0]);
for($i=1;$i<$nbNoteE2;$i++){
    $y2 = 150 - (5*$noteE2[$i]);
    imageline($image,50+($i-1)*65,$y1,50+$i*65,$y2,$bleu);
    $y1 = $y2;
}
//imageline($image,0,150,15,75,$blanc);
imagestring($image, 5, 275, 5, "Notes des etudiants E1 et E2", $noir);
imagestring($image,5,50,150,"E1",$blanc);
imagestring($image,5,75,150,"E2",$bleu);
imagestring($image,5,575,150,"Moyenne E1 : ".$moyE1,$noir);
imagestring($image,5,575,170,"Moyenne E2 : ".$moyE2,$noir);

imagepng($image);
?>