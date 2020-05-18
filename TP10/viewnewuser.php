<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <br>
        <div class="col-md-8 offset-md-2">
            <h1>Inscription</h1><br>
            <form action="viewnewuser.php" method="post">
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" id="login" name="login" minlength="6" maxlength="15">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" minlength="6" maxlength="20">
                </div>
                <div class="form-group">
                    <label for="mail">Mail</label>
                    <input type="email" class="form-control" id="mail" name="mail" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" maxlength="20">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" maxlength="20">
                </div><br>
                <button class="btn btn-primary" type="submit">Envoyer</button>
            </form>
            <?php
            include 'connexpdo.php';

            $dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=etudiants';
            $user = 'postgres';
            $password = 'password';

            echo "i'm here";

            $dbh = connexpdo($dsn,$user,$password);

            if(isset($_POST["login"],$_POST["password"],$_POST["mail"],$_POST["nom"],$_POST["prenom"])) {
                $sql = "INSERT INTO utilisateur (login,password,mail,nom,prenom) VALUES (?,?,?,?,?)";
                $pswd = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $insert = $dbh->prepare($sql);
                $insert->execute([$_POST["login"], $pswd, $_POST["mail"], $_POST["nom"], $_POST["prenom"]]);
                header("location:index.php");
            }
            ?>
        </div>
    </body>
</html>