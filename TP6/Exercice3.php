<form action="Exercice3.php" method="post">
    Nom : <input type="text" name="nom"><br>
    Prénom : <input type="text" name="prenom"><br>
    Mail : <input type="text" name="mail"><br>
    Age : <input type="number" name="age" value="--Age--" min="0" max="20"><br>
    Monsieur : <input type="checkbox" name="gender" value="Monsieur"> Madame : <input type="checkbox" name="gender" value="Madame"><br>
    <input type='submit' value='Valider'/><br>
</form>
<?php
class formResult{
    private $nom;
    private $prenom;
    private $mail;
    private $age;
    private $gender;

    function __construct(){
        if(isset($_POST["nom"])){$this->nom=$_POST["nom"];}
        if(isset($_POST["prenom"])){$this->prenom=$_POST["prenom"];}
        if(isset($_POST["mail"])){$this->mail=$_POST["mail"];}
        if(isset($_POST["age"])){$this->age=$_POST["age"];}
        if(isset($_POST["gender"])){$this->gender=$_POST["gender"];}
    }
    function getNom(){
        return $this->nom;
    }
    function getPrenom(){
        return $this->prenom;
    }
    function getMail(){
        return $this->mail;
    }
    function getAge(){
        return $this->age;
    }
    function getGender(){
        return $this->gender;
    }
}

$result = new formResult();
if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["age"]) && isset($_POST["mail"]) && isset($_POST["gender"])) {
    echo "Vous êtes " . $result->getGender() . " " . $result->getNom() . " " . $result->getPrenom() . ". Vous avez " . $result->getAge() . " ans et votre mail est " . $result->getMail() . ".";
}