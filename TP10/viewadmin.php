<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <br>
        <div class="col-md-7 offset-md-2">
            <div class="container">
                <div class="row">

            <?php
            include 'connexpdo.php';

            $dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=etudiants';
            $user = 'postgres';
            $password = 'password';

            $dbh = connexpdo($dsn,$user,$password);

            $query = "SELECT * FROM utilisateur WHERE id=?";
            $sel = $dbh->prepare($query);
            $sel->execute([$_GET["id"]]);
            $rst = $sel->fetch();
            echo "<h1 class='col-8'>Bienvenue ".$rst["nom"]." ".$rst["prenom"]."</h1>"
            ?>
                <a class="offset-2 btn btn-danger btn-lg" type="button" href="viewlogin.php" >Déconnexion</a>
            </div>
            <br>
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Note</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query2 = "SELECT * FROM etudiant WHERE user_id=?";
                    $sel2 = $dbh->prepare($query2);
                    $sel2->execute([$_GET["id"]]);
                    $rst2 = $sel2->fetchAll();
                    $nbEtudiant = 0;
                    foreach ($rst2 as $etu){
                        $nbEtudiant++;
                        echo "<tr>
                                  <th scope='row'>".$etu["id"]."</th>
                                  <td>".$etu["nom"]."</td>
                                  <td>".$etu["prenom"]."</td>
                                  <td>".$etu["note"]."</td>
                                </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <br>

                <div class="row">
                    <div class="col">
                        <a class="btn btn-success btn-lg" type="button" href="view-newetudiant.php?id=<?php echo $_GET["id"]; ?>" >Ajouter étudiant</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-info btn-lg" type="button" href="view-editetudiant.php?id=<?php echo $_GET["id"]; ?>" >Modifier étudiant</a>
                    </div>
                    <div class="col">
                        <h3>Supprimer un étudiant</h3>
                        <form action="controller.php?func=deleteEtudiant&userId=<?php echo $_GET["id"]; ?>" method="post">
                            <label for="etuId1">ID de l'étudiant</label>
                            <select id="etuId1" class="col-4 form-control" name="etuId1">
                                <?php
                                for($i=1;$i<=$nbEtudiant;$i++){
                                    echo "<option>".$i."</option>";
                                }
                                ?>
                            </select><br>
                            <button class="btn btn-danger btn-lg" type="submit">Supprimer étudiant</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    
    </body>
</html>
