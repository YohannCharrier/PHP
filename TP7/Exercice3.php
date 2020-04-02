<?php

Trait Un{
    function small($texte){
        echo "<small>".$texte."</small><br>";
    }
    function big($texte){
        echo "<h4>".$texte."</h4><br>";
    }
}

Trait Deux{
    function small($texte){
        echo "<i>".$texte."</i><br>";
    }
    function big($texte){
        echo "<h2>".$texte."</h2><br>";
    }
}

class Texte{
    use Un, Deux{
        Deux::small insteadof Un;
        Un::big insteadof Deux;
        Deux::big as gros;
        Un::small as petit;
    }
}

$txt = new Texte();
$txt->big("BIG");
$txt->small("small");
$txt->gros("GROS");
$txt->petit("petit");
