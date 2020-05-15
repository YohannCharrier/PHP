<!doctype html>
<html lang="fr">
    <head>
        <title>Citations</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Auteurs de la BD</h1>
        <table>
            <tr><td>Nom</td><td>Prenom</td></tr>
        <?php

        include 'connexpdo.php';

        $dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=citations';
        $user = 'postgres';
        $password = 'password';

        $dbh = connexpdo($dsn,$user,$password);

        $query1 = "SELECT nom, prenom FROM auteur";
        $result1= $dbh->query($query1);
        foreach($result1 as $author){
            echo "<tr><td>".$author['nom']."</td><td>".$author['prenom']."</td></tr>";
        }
        ?>
        </table>
        <h1>Citations de la BD</h1>
        <?php
        $query2 = "SELECT phrase FROM citation";
        $result2 = $dbh->query($query2);
        foreach($result2 as $citation){
            echo $citation['phrase']."<br>";
        }
        ?>
        <h1>Siècles de la BD</h1>
        <?php
        $query3 = "SELECT numero FROM siecle";
        $result3 = $dbh->query($query3);
        foreach($result3 as $siecle){
            echo $siecle['numero']."<br>";
        }

        ?>
    </body>
</html>



