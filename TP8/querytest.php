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

        $dsn = 'pgsql:dbname=citations;host=127.0.0.1;port=5432';
        $user = 'postgres';
        $password = 'password';

        $dbh = connexpdo($dsn,$user,$password);

        $query1 = "SELECT nom,prenom FROM auteur";
        $result1= $dbh->query($query1);
        for($i=0;$i<count($result1);$i++){
            echo "<tr><td>$result1[i][0]</td><td>$result1[i][1]</td></tr>";
        }
        echo "</table>";
        $query2 = "SELECT phrase FROM citation";
        $result2 = $dbh->query($query2);

        $query3 = "SELECT numero FROM siecle";
        $result3 = $dbh->query($query3);

        ?>
    </body>
</html>



