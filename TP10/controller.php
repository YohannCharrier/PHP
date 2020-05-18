<?php
include 'connexpdo.php';



function addUser(){
    $dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=etudiants';
    $user = 'postgres';
    $password = 'password';

    echo "i'm here";

    $dbh = connexpdo($dsn,$user,$password);
    if(isset($_POST["login"],$_POST["password"],$_POST["mail"],$_POST["nom"],$_POST["prenom"])) {
        $sql = "INSERT INTO utilisateur (id,login,password,mail,nom,prénom) VALUES (DEFAULT,?,?,?,?,?)";
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $insert = $dbh->prepare($sql);
        $insert->execute([$_POST["login"], $password, $_POST["mail"], $_POST["nom"], $_POST["prenom"]]);
        header("location:index.php");
    }

}