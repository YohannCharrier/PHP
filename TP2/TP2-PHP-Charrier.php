<h1>Opérateurs, Tableaux et Structures de contrôle</h1>
<h2>Exercice 1</h2>
<?php
$age = mt_rand(0,100);
if($age<=12){
    echo "$age : enfant<br>";
} elseif ($age<=19){
    echo "$age : ado<br>";
} elseif ($age<=50){
    echo "$age : adulte<br>";
} elseif ($age<=70){
    echo "$age : sénior<br>";
} else {
    echo "$age : âgé<br>";
}

$age = mt_rand(0,100);
switch($age){
    case ($age<=12) : echo "$age : enfant<br>"; break;
    case ($age>12 && $age<=19) : echo "$age : ado<br>"; break;
    case ($age>19 && $age<=50) : echo "$age : adulte<br>"; break;
    case ($age>50 && $age<=70) : echo "$age : sénior<br>"; break;
    case ($age>70) : echo "$age : âgé<br>"; break;
}

echo "<h2>Exercice2</h2>";
$n0 = 0;
$n1 = 1;
$n2 = $n0 + $n1;
$i = 2;
echo "$n0 : $n1 : $n2 ";
while($i<20){
    $n0 = $n1;
    $n1 = $n2;
    $n2 = $n0 + $n1;
    echo ": $n2 ";
    $i++;
}

echo "<br>";
$n1 = 1;
$n2 = 1;
$i = 1;
do{
    $quotient = $n2/$n1;
    echo "$quotient ";
    $tmp = $n1;
    $n1 = $n2;
    $n2 = $n2 + $tmp;
    $i++;
}while($i<30);

echo "<h2>Exercice3</h2>";

$somme = 0;
for($i=1;$i<15000;$i++){
    $somme += (1/($i*$i));
}
$somme = $somme*6;
$somme= $somme**0.5;
echo("pi = $somme");

echo"<h2>Exercice4 </h2>";
$tab = array(
    "Coluche" => "Je suis capable du meilleur et du pire, dans le pire, c'est moi le meilleur.",
    "Laurine" => "Qui pisse contre le vent, se rince les dents",
    "Rochefort" => "Si haut qu'on monte, on finit toujours pas des cendres",
    "Diderot" => "Etre neutre, c'est profiter des embarras des autres pour arranger ses affaires"
);
foreach ($tab as $key => $value){
    echo"-$key : \"$value\"<br>";
}

echo"<h2>Exercice5</h2>";
$number = mt_rand();
echo"<table><thead><tr><th>Table de $number</th></tr></thead><tbody>";
$tab1 = array(
    "1x$number" => 1*$number,
    "2x$number" => 2*$number,
    "3x$number" => 3*$number,
    "4x$number" => 4*$number,
    "5x$number" => 5*$number
);
foreach($tab1 as $key => $value){
    echo"<tr><td>$key</td><td>$value</td></tr>";
}
echo"</tbody></table>";

echo"<h2>Exercice6</h2>";
echo"Nombres premiers entre 2 et 97 : <br>";
for($i=2;$i<=97;$i++){
    $premier=true;
    for($j=2;$j<=($i**0.5)+1;$j++){
        if($i%$j==0){
            if($i!=$j){
                $premier=false;
            }
        }
    }
    if($premier==true){
        echo"$i<br>";
    }
}

echo"<h2>Exercice7</h2>";
$annuaire=array(
    "PUJOL Olivier" => "03 89 72 84 48",
    "IMBERT Jo"=>"03 89 36 06 05",
    "SPIEGEL Pierre"=>"03 87 67 92 37",
    "THOUVENOT Frédéric"=>"01 42 86 02 12",
    "MEGEL Pierre"=>"09 59 71 46 96",
    "SUCHET Loïc"=>"03 89 33 10 54",
    "GIROIS Francis"=>"03 88 01 21 15",
    "HOFFMANN Emmanuel"=>"03 89 69 20 05",
    "KELLER Fabien"=>"04 18 52 34 25",
    "LEY Jean-Marie"=>"03 89 43 17 85",
    "ZOELLE Thomas"=>"04 18 65 67 69",
    "WILHELM Olivier"=>"03 89 60 48 78",
    "BLIN Nathalie"=>"01 28 59 23 25",
    "BICARD Pierre-Eric"=>"03 89 69 25 82",
    "ZIEGLER Thierry"=>"03 89 06 33 89",
    "BADER Jean"=>"03 89 25 65 72",
    "ROSSO Anne-Sophie"=>"01 56 20 02 36",
    "ROTTNER Thierry"=>"03 88 29 61 54",
    "WEBER Joao"=>"03 89 35 45 20",
    "SCHILLINGER Olivier"=>"03 84 21 38 40",
    "BICARD Muriel"=>"03 89 33 47 99 ",
    "KELLER Christian"=>"03 88 19 16 10 ",
    "GROELLY Antonio"=>"03 89 33 60 63",
    "ALLARD Aline"=>"03 89 56 49 19",
    "WINNINGER Bénédicte"=>"04 16 14 86 66"
);
ksort($annuaire,SORT_STRING);
echo"<table><thead><tr><th colspan=\"2\">ANNUAIRE</th></tr></thead><tbody>";
foreach ($annuaire as $key => $value){
    echo "<tr><td>$key</td><td>$value</td></tr>";
}
echo"</tbody></table>";

echo"<h2>Exercice8</h2>";
$A1 = true;
$A2 = false;
$A3 = true;
$A4 = false;
$A5 = true;
$A6 = true;
$lampe;
if($A1==true){
    if($A3==true || ($A4==true && $A5==true)){
        $lampe=true;
    }
    else{
        $lampe=false;
    }
} elseif ($A2==true && $A6==true){
    $lampe=true;
} else{
    $lampe=false;
}
if($lampe){
    echo"La lampe est allumée";
} else {
    echo"La lampe est éteinte";
}

echo"<h2>Exercice9</h2>";
$string = "CIR-NANTES<br>";
echo"Le message est : $string";
for($i=0;$i<strlen($string);$i++){
    if($string[$i]<'Z' && $string[$i]>='A'){
        $string[$i]=chr(ord($string[$i])+1);;
    } elseif($string[$i]=='Z'){
        $string[$i]='A';
    }
}
echo"Le message codé est : $string<br>";

echo"<h2>Exercice10</h2>";
$taille = "15M";
$length = strlen($taille);
$octet;
$num = intval(trim($taille,"KMGT"));
switch($taille[$length-1]){
    case 'T' : $octet = $num * 1024;
    case 'G' : $octet = $num * 1024;
    case 'M' : $octet = $num * 1024;
    case 'K' : $octet = $num * 1024; echo"La taille du document est : $octet octets<br>";
}
?>