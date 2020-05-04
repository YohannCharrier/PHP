<?php


function connexpdo($database,$user,$password){
    try {
        return new PDO($database,$user,$password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}