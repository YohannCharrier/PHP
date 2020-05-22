<?php
include 'connexpdo.php';

$dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=etudiants';
$user = 'postgres';
$password = 'password';

$dbh = connexpdo($dsn,$user,$password);

function addUser($dbh){

    if(isset($_POST["login"],$_POST["password"],$_POST["mail"],$_POST["nom"],$_POST["prenom"])) {
        $sql = "INSERT INTO utilisateur (id,login,password,mail,nom,prenom) VALUES (DEFAULT,?,?,?,?,?)";
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $insert = $dbh->prepare($sql);
        $insert->execute([$_POST["login"], $password, $_POST["mail"], $_POST["nom"], $_POST["prenom"]]);
        header("location:index.php");
    }

}

function connect($dbh){
    if(isset($_POST["login"],$_POST["password"])){
        $query = "SELECT * FROM utilisateur WHERE login=?";
        $select = $dbh->prepare($query);
        $select->execute([$_POST["login"]]);
        $result = $select->fetchAll();
        if($result==null){
            header("location:viewlogin.php?login=false");
        }else {
            foreach ($result as $user) {
                if (password_verify($_POST["password"], $user["password"])) {
                    header("location:viewadmin.php?id=".$user["id"]);
                } else {
                    header("location:viewlogin.php?password=false");
                }
            }
        }
    }
}

function addEtudiant($dbh){
    if(isset($_POST["userId"],$_POST["nom"],$_POST["prenom"],$_POST["note"])){
        $add = "INSERT INTO etudiant (id,user_id,nom,prenom,note) VALUES (DEFAULT,?,?,?,?)";
        $add2 = $dbh->prepare($add);
        $add2->execute([$_POST["userId"],$_POST["nom"],$_POST["prenom"],$_POST["note"]]);
        header("location:viewadmin.php?id=".$_POST["userId"]);
    }
}

function deleteEtudiant($dbh){
    if(isset($_POST["etuId1"])){
        $del = "DELETE FROM etudiant WHERE id=?";
        $del2 = $dbh->prepare($del);
        $del2->execute([$_POST["etuId1"]]);
        header("location:viewadmin.php?id=".$_GET["userId"]);
    }
}

function modifyEtudiant($dbh){
    if(isset($_POST["id"],$_POST["nom"],$_POST["prenom"],$_POST["note"])){
        echo "modify";
        $mod = "UPDATE etudiant SET nom=?,prenom=?,note=? WHERE id=?";
        echo "mod";
        $mod2 = $dbh->prepare($mod);
        echo "prepare";
        $mod2->execute([$_POST["nom"],$_POST["prenom"],$_POST["note"],$_POST["id"]]);
        echo "execute";
        header("location:viewadmin.php?id=".$_GET["userId"]);
    }
}

if($_GET["func"]=="addUser"){
    addUser($dbh);
}
if($_GET["func"]=="connect"){
    connect($dbh);
}
if($_GET["func"]=="addEtudiant"){
    addEtudiant($dbh);
}
if($_GET["func"]=="deleteEtudiant"){
    deleteEtudiant($dbh);
}
if($_GET["func"]=="modifyEtudiant"){
    modifyEtudiant($dbh);
}