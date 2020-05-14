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
                <div class='col-md-4'>
                    <div class='form-group'>
                        <label for='exampleInputEmail1'>Auteur</label>
                        <select class='form-control' name='author'>";
        foreach ($result1 as $author){
            echo "<option>".$author['prenom']." ".$author['nom']."</option>";
        }
        echo "</select>
                </div>
    
                <div class='form-group'>
                    <label for='exampleInputPassword1'>Siècle</label>
                    <select class='form-control' name='siecle'>";
        foreach ($result2 as $siecle){
            echo "<option>".$siecle['numero']."</option>";
        }
        echo "</select>
                </div>
    
                <button type='submit' class='btn btn-primary'>Rechercher</button>
            </div>
        </form>";
        if(isset($_POST["auteur"]) && isset[$_POST["siecle"]]){

        }
        ?>
    </body>
</html>

