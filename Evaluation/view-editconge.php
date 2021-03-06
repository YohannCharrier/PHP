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
<div class="offset-3 col-5">
    <h3>Modifier un congé</h3>
    <form action="" method="post">
        <div class="form-group">
            <label for="congeId">ID congé</label>
            <select id="congeId" class="col-4 form-control" name="congeId">
                <?php
                include 'connexpdo.php';

                $dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=conge';
                $user = 'postgres';
                $password = 'password';

                $dbh = connexpdo($dsn,$user,$password);
                session_start();
                $user_id = $_SESSION["user_id"];

                $query2 = "SELECT * FROM conges WHERE user_id=?";
                $sel2 = $dbh->prepare($query2);
                $sel2->execute([$user_id]);
                $rst2 = $sel2->fetchAll();
                foreach ($rst2 as $con){
                    echo "<option>".$con["id"]."</option>";
                }
                ?>
            </select>
        </div>
        <button class='col-6 btn btn-info' type='submit'>Sélectionner</button>
    </form><br>
    <?php
    if(isset($_POST["congeId"])){
        $query3 = "SELECT * FROM conges WHERE id=?";
        $sel3 = $dbh->prepare($query3);
        $sel3->execute([$_POST["congeId"]]);
        $rst3 = $sel3->fetch();

        echo "<form action='controller.php?func=modifyConge' method='post'>
                                    <div class='form-group'>
                                        <label for='id'>ID conge</label>
                                        <input type='number' class='col-3 form-control' id='id' name='id' value='".$rst3["id"]."' readonly>
                                    </div>
                                    <div class='form-group'>
                                        <label for='nbJours'>Nombre de jours</label>
                                        <input type='number' class='form-control' id='nbJours' name='nbJours' value='".$rst3["nbconges"]."'>
                                    </div>
                                    <br>
                                    <button class='col-6 btn btn-info' type='submit'>Modifier</button>
                                  </form>";
    }
    ?>
</div>
</body>
</html>