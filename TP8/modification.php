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
        <div class="offset-md-2 col-md-8">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="citation.php">Information</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="recherche.php">Recherche<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="modification.php">Modification</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <h1>Ajout</h1>
            <form action="modification.php" method="post">
                <div class="form-group">
                    <label for="auteurId">ID de l'auteur</label>
                    <input type="number" class="form-control" id="auteurId" name="auteurID">
                </div>
                <div class="form-group">
                    <label for="auteurName">Nom de l'auteur</label>
                    <input type="text" class="form-control" id="auteurName" name="auteurName">
                </div>
                <div class="form-group">
                    <label for="auteurPre">Prénom de l'auteur</label>
                    <input type="text" class="form-control" id="auteurPre" name="auteurPre">
                </div>
                <div class="form-group">
                    <label for="siecleID">Id du siècle</label>
                    <input type="number" class="form-control" id="siecleID" name="siecleID">
                </div>
                <div class="form-group">
                    <label for="siecle">Siècle</label>
                    <input type="text" class="form-control" id="siecle" name="siecle">
                </div>
                <div class="form-group">
                    <label for="citation">Citation</label>
                    <input type="text" class="form-control" id="citation" name="citation">
                </div>
                <button type='submit' class='btn btn-secondary'>Ajouter</button>
            </form>
            <?php
            include 'connexpdo.php';

            $dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=citations';
            $user = 'postgres';
            $password = 'password';

            $dbh = connexpdo($dsn,$user,$password);

            if(isset($_POST["auteurID"],$_POST["auteurName"],$_POST["auteurPre"],$_POST["siecleID"],$_POST["siecle"],$_POST["citation"])){

                $sql = "INSERT INTO auteur (id, nom, prenom) VALUES (?, ?, ?)";
                $sql2 = "INSERT INTO siecle (id,numero) VALUES (?,?)";
                $sql3 = "INSERT INTO citation (id,phrase,auteurid,siecleid) VALUES (?,?,?,?)";

                $citId = $_POST["auteurID"] + $_POST["siecleID"];

                $insert = $dbh->prepare($sql);
                $insert->execute([$_POST["auteurID"],$_POST["auteurName"],$_POST["auteurPre"]]);

                $insert2 = $dbh->prepare($sql2);
                $insert2->execute([$_POST["siecleID"],$_POST["siecle"]]);

                $insert3 = $dbh->prepare($sql3);
                $insert3->execute([$citId,$_POST["citation"],$_POST["auteurID"],$_POST["siecleID"]]);

            }
            ?>
            <br>
            <h1>Suppression</h1>
            <form action="modification.php" method="post">
                <select class="col-md-3 form-control" name="idCit">
                    <option value="0" selected>Sélectionnez l'ID d'une citation</option>
                    <?php
                    $query = "SELECT id FROM citation";
                    $rst = $dbh->query($query);
                    foreach ($rst as $cit) {
                        echo "<option value='" . $cit["id"] . "'>" . $cit["id"] . "</option>";
                    }
                    ?>
                </select><br>
                <button type='submit' class='btn btn-secondary'>Supprimer</button>
            </form>
            <?php
            if(isset($_POST["idCit"])){
                echo $_POST["idCit"];
                $supp = "DELETE FROM citation WHERE id=?";
                $rst2 = $dbh->prepare($supp);
                $rst2->execute([$_POST["idCit"]]);
            }
            ?>
        </div>
    </body>
</html>
