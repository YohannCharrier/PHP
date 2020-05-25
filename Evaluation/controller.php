<?php

include 'connexpdo.php';

$dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=conge';
$user = 'postgres';
$password = 'password';

$dbh = connexpdo($dsn,$user,$password);
session_start();

function newUser($dbh){

    if(isset($_POST["nom"],$_POST["prenom"])) {
        $user = strtolower($_POST["prenom"][0].$_POST["nom"]) ;
        $_SESSION["user"] = $user;
        $_SESSION["prenom"] = $_POST["prenom"];
        $_SESSION["nom"] = $_POST["nom"];
        header("location:view-inscript.php?insert=true");
    }
    else{
        header("location:view-inscript.php");
    }

}

function setPassword($dbh){
    if(isset($_POST["password"],$_POST["passwordVerif"]) && $_POST["password"]==$_POST["passwordVerif"]){
        $sql2 = "INSERT INTO utilisateur VALUES (DEFAULT,?,?,?,?)";
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $insrt = $dbh->prepare($sql2);
        $insrt->execute([$_SESSION["user"], $password, $_SESSION["nom"], $_SESSION["prenom"]]);
        header("location:view-accueil.php");
    }
    else{
        header("location:view-inscript.php?insert=true&password=false");
    }
}
function connect($dbh){
    if(isset($_POST["login"],$_POST["password"])){
        $query = "SELECT * FROM utilisateur WHERE utilisateur=?";
        $select = $dbh->prepare($query);
        $select->execute([$_POST["login"]]);
        $result = $select->fetchAll();
        if($result==null){
            header("location:view-accueil.php?login=false");
        }else {
            foreach ($result as $user) {
                if (password_verify($_POST["password"], $user["password"])) {
                    $_SESSION["user_id"]=$user["id"];
                    header("location:view-conge.php");
                } else {
                    header("location:view-accueil.php?password=false");
                }
            }
        }
    }
}

function modifyConge($dbh){
    if(isset($_POST["id"],$_POST["nbJours"])){
        $mod = "UPDATE conges SET nbconges=?,date=CURRENT_DATE,time=CURRENT_TIME WHERE id=?";
        $mod2 = $dbh->prepare($mod);
        $mod2->execute([$_POST["nbJours"],$_POST["id"]]);
        header("location:view-conge.php");
    }
}

function addConge($dbh){
    if(isset($_POST["userId"],$_POST["nbJours"])){
        $add = "INSERT INTO conges (id,nbconges,date,hour,user_id) VALUES (DEFAULT,?,CURRENT_DATE ,CURRENT_TIME ,?)";
        $add2 = $dbh->prepare($add);
        $add2->execute([$_POST["nbJours"],$_POST["userId"]]);
        header("location:view-conge.php");
    }
}

function deleteConge($dbh){
    if(isset($_POST["congeId"])){
        $del = "DELETE FROM conges WHERE id=?";
        $del2 = $dbh->prepare($del);
        $del2->execute([$_POST["congeId"]]);
        header("location:view-conge.php");
    }
}

if($_GET["func"]=="setPassword"){
    setPassword($dbh);
}
if($_GET["func"]=="newUser"){
    newUser($dbh);
}
if($_GET["func"]=="connect"){
    connect($dbh);
}
if($_GET["func"]=="modifyConge"){
    modifyConge($dbh);
}
if($_GET["func"]=="deleteConge"){
   deleteConge($dbh);
}
if($_GET["func"]=="addConge"){
    addConge($dbh);
}
