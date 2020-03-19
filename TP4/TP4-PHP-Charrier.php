<?php
echo "<h1>Exercice1</h1>";
echo "EN : ".date('l j F Y',time())."<br>";
setlocale(LC_TIME, "fr_FR.UTF8");
echo "FR : ".strftime( '%A %d %B %G', time())."<br>";
echo "Date et Heure : ".strftime( '%d/%m/%Y %H:%M', time())."<br>";
echo "Il est passé ".time()."s depuis la création d'UNIX";

echo "<h1>Exercice2</h1>";
$date1 = new DateTime("now");
$date2 = new DateTime("2000-05-13");
echo "Date de naissance : ".strftime("%d-%m-%Y",mktime(0,0,0,05,13,2000))."<br>";
echo "Date du jour : ".strftime("%d-%m-%Y",time())."<br>";
$datediff = date_diff($date1,$date2);
$secondes = $date1->format("%U")-$date2->format("%U");
echo "Age : ".$datediff->format("%Y ans %m mois et %D jours")." = ".$datediff->days." jours = ".($datediff->days*86400)." secondes";

echo "<h1>Exercice3</h1>";
$dateLune = new DateTime("2020-02-09 08:34:35");
$inter = new DateInterval("P29DT12H44M03S");
$lune2 = $dateLune->add($inter);
$lune100 = $dateLune;
echo "Prochaine pleine Lune : ".$lune2->format("d/m/Y H:i:s")."<br>";
for($i=0;$i<100;$i++){
    $lune100 = $lune100->add($inter);
}
echo "100ème prochaine pleine Lune : ".$lune100->format("d/m/Y H:i:s")."<br>";

echo "<h1>Exercice4</h1>";
if(checkdate(02,29,1962)){
    echo "Le 29 Février 1962 existe.<br>";
} else {
    echo "Le 29 Février 1962 n'existe pas.<br>";
}

echo "<h1>Exercice5</h1>";
$jour = getdate(strtotime("1993-03-03"));
switch($jour[wday]){
    case 0 : echo "Le 3 mars 1993 est un Dimanche";
        break;
    case 1 : echo "Le 3 mars 1993 est un Lundi";
        break;
    case 2 : echo "Le 3 mars 1993 est un Mardi";
        break;
    case 3 : echo "Le 3 mars 1993 est un Mercredi";
        break;
    case 4 : echo "Le 3 mars 1993 est un Jeudi";
        break;
    case 5 : echo "Le 3 mars 1993 est un Vendredi";
        break;
    case 6 : echo "Le 3 mars 1993 est un Samedi";
        break;
}

echo "<h1>Exercice6</h1>";
for($annee=2020;$annee<=2062;$annee++){
    $date = mktime(0,0,0,1,1,$annee);
    if(date("L",$date)){
        echo "L'année $annee est une année bisextile<br>";
    }
}

echo "<h1>Exercice7</h1>";
for($annee=2020;$annee<=2030;$annee++){
    $jour = getdate(strtotime("$annee-05-01"))[wday];
    if($jour==0 || $jour==6){
        echo "Le 1er Mai $annee : Week-end non prolongé<br>";
    } else {
        echo "Le 1er Mai $annee : Week-end prolongé<br>";
    }
}
?>