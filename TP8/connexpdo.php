<?php

function connexpdo($database,$user,$password){
    try {
        $dbh = new PDO($database,$user,$password);
        return $dbh;
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}