<?php

echo "<h2>Exercice1</h2><br>";
function increment(){
    static $nb=0;
    $nb++;
    echo "$nb<br>";
}
increment();
increment();
increment();
increment();

echo "<h2>Exercice2</h2><br>";
function add(&$arg){
    $arg += 10;
    return $arg;
}
$nb=1;
$arg = &$nb;
echo"$arg + 10 =";
add($arg);
echo " $arg<br>";

echo "<h2>Exercice3</h2><br>";
echo "<h3>1)</h3><br>";

$identite = ['alain', 'basile', 'David', 'Edgar'];
$age = [1, 15, 35, 65];
$mail = ['penom.nom@gtail.be', 'truc@bruce.zo', 'caro@caramel.org', 'trop@monmel.fr'];
function tab($tab){
    $array[2][4];
    for($i=0;$i<4;$i++){
        $j = strpos($tab[$i],'@')+1;
        //echo "Nom de domaine : ";
        $domaine ="";
        while($tab[$i][$j]!='.'){
            $domaine = $domaine.$tab[$i][$j];
            $j++;
        }
        //echo"$domaine";
        $array[1][$i] = $domaine;
        $extension = "";
        //echo " et extension : ";
        for($k=$j+1;$k<strlen($tab[$i]);$k++){
            $extension = $extension.$tab[$i][$k];
        }
        //echo "$extension<br>";
        $array[2][$i] = $extension;
    }
    return $array;
}
$info = tab($mail);
$dom;
$extension = 0;
for($i=0;$i<4;$i++){
    echo "Nom de domaine $info";
}
echo "<h3>2)</h3><br>";
function tab2($identite,$age,$mail){
    $nb=mt_rand(0,4);
    $domaine = tab($mail)[1];
    $extension = tab($mail)[2];
    if($age[$nb]<=1){
        echo "Je me nomme $identite[$nb] j'ai $age[$nb] an et mon mail est $mail[$nb] du domaine $domaine[$nb] et d'extension $extension[$nb]";
    }
    else {
        echo "Je me nomme $identite[$nb] j'ai $age[$nb] ans et mon mail est $mail[$nb] du domaine $domaine[$nb] et d'extension $extension[$nb]";
    }
}
tab2($identite,$age,$mail);
?>