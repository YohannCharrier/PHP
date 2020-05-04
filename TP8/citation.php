<!DOCTYPE html>
<html>
    <head>
        <title>Site</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="citation.php">Information</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="recherche.php">Recherche<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="modification.php">Modification</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <h1>La Citation du Jour</h1>
    <hr>
    <?php
        include 'connexpdo.php';
        $db = connexpdo('pgsql:host=127.0.0.1;port=5432;dbname=citations','postgres','pass');
        $query1 = "SELECT * FROM citation";
        $rst1 = $db->query($query1);
        $nbCit = 0;
        foreach($rst1 as $cit){
            $nbCit++;
        }
        echo "<p>Il y a <b>".$nbCit."</b> citations répertoriées.</p>";
    ?>
    <p>Et voici l'une d'entre elles qui est générée aléatoirement :</p>
    <?php
        $query2 = "SELECT * FROM citation WHERE id=?";
        $id = rand(1,$nbCit);
        $sth = $db->prepare($query2);
        $sth->execute(array($id));
        $rst2 = $sth->fetch();
        echo "<p><b>".$rst2['phrase']."</b><br>";

        $query3 = "SELECT * FROM auteur WHERE id=?";
        $query4 = "SELECT * FROM auteur WHERE id=?";

        $idAut = $rst2['auteurid'];
        $idSiecle = $rst2['siecleid'];

        $sth2 = $db->prepare($query3);
        $sth2->execute(array($idAut));
        $rst3 = $sth2->fetch();
        $sth3 = $db->prepare($query4);
        $sth3->execute(array($idSiecle));
        $rst4 = $sth3->fetch();

        echo $rst3['prenom']." ".$rst3['nom']." (".$rst4['numero']." siècle)</p>"
    ?>

    </body>
</html>
