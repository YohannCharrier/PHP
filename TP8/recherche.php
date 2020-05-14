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
                    <li class="nav-item active">
                        <a class="nav-link" href="recherche.php">Recherche<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="modification.php">Modification</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="col-md-6">
            <h1>Rechercher une citation</h1>
            <?php

            include 'connexpdo.php';

            $dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=citations';
            $user = 'postgres';
            $password = 'pass';

            $dbh = connexpdo($dsn,$user,$password);

            $query1 = "SELECT nom, prenom FROM auteur";
            $result1= $dbh->query($query1);

            $query2 = "SELECT numero FROM siecle";
            $result2 = $dbh->query($query2);

            echo "<form action='recherche.php' method='post'>
                        <div class='form-group'>
                            <label for='exampleInputEmail1'>Auteur</label>
                            <select class='form-control' name='author'>";
            foreach ($result1 as $author){
                echo "<option value='".$author['nom']."'>".$author['prenom']." ".$author['nom']."</option>";
            }
            echo "</select>
                    </div>
        
                    <div class='form-group'>
                        <label for='exampleInputPassword1'>Siècle</label>
                        <select class='form-control' name='siecle'>";
            foreach ($result2 as $siecle){
                echo "<option value='".$siecle['numero']."'>".$siecle['numero']."</option>";
            }
            echo "</select>
                    </div>        
                    <button type='submit' class='btn btn-primary'>Rechercher</button>
            </form>
            <br>";
            if(isset($_POST["author"]) && isset($_POST["siecle"])){
                $query3 = "SELECT phrase FROM citation WHERE auteurid=? AND siecleid=?";
                $queryAutId = "SELECT id FROM auteur WHERE nom=?";
                $querySieId = "SELECT id FROM siecle WHERE numero=?";

                $sth = $dbh->prepare($queryAutId);
                $sth->execute(array($_POST["author"]));
                $rst = $sth->fetch();
                $AutId = $rst["id"];

                $sth2 = $dbh->prepare($querySieId);
                $sth2->execute(array($_POST["siecle"]));
                $rst2 = $sth2->fetch();
                $SieId = $rst2["id"];

                $sth3 = $dbh->prepare($query3);
                $sth3->execute(array($AutId,$SieId));
                $rst3 = $sth3->fetchAll();

                echo "<div class='container'>
                        <div class='row'>
                            <div class='col-md-8'>Citations</div>
                            <div class='col-md-2'>Auteur</div>
                            <div class='col-md-2'>Siècle</div>
                        </div>
                       </div>
                       <hr>";
                foreach($rst3 as $citation){
                    echo "<div class='container'>
                        <div class='row'>
                            <div class='col-md-8'>".$citation['phrase']."</div>
                            <div class='col-md-2'>".$_POST['author']."</div>
                            <div class='col-md-2'>".$_POST['siecle']."</div>
                        </div>
                       </div>
                       <hr>";
                }

            }
            ?>
        </div>
    </body>
</html>

