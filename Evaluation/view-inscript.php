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
    <h1>Inscrivez-vous</h1><br>
    <?php

    if($_GET["insert"]!="true"){
        echo "<form action=\"controller.php?func=newUser\" method=\"post\">
        <div class=\"form-group\">
            <label for=\"nom\">Nom</label>
            <input type=\"text\" class=\"form-control\" id=\"nom\" name=\"nom\" maxlength=\"25\" required>
        </div>
        <div class=\"form-group\">
            <label for=\"prenom\">Prénom</label>
            <input type=\"text\" class=\"form-control\" id=\"prenom\" name=\"prenom\" maxlength=\"25\" required>
        </div>
        <br>
        <button class=\"btn btn-primary\" type=\"submit\">Envoyer</button>
    </form>";
    } else {
        include 'connexpdo.php';

        $dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=conge';
        $user = 'postgres';
        $password = 'password';

        $dbh = connexpdo($dsn,$user,$password);
        session_start();

        echo "<form action=\"controller.php?func=setPassword\" method=\"post\">
        <div class=\"form-group\">
            <label for=\"nom\">Nom</label>
            <input type=\"nom\" class=\"form-control\" id=\"nom\" name=\"nom\" value='".$_SESSION["nom"]."' readonly>
        </div>
        <div class=\"form-group\">
            <label for=\"user\">Prenom</label>
            <input type=\"text\" class=\"form-control\" id=\"prenom\" name=\"prenom\" value='".$_SESSION["prenom"]."' readonly>
        </div>
        <div class=\"form-group\">
            <label for=\"user\">Utilisateur</label>
            <input type=\"text\" class=\"form-control\" id=\"user\" name=\"user\" value='".$_SESSION["user"]."' readonly>
        </div>
        <div class=\"form-group\">
            <label for=\"password\">Password</label>
            <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" minlength=\"6\" maxlength=\"20\" required>
        </div>
        <div class=\"form-group\">
            <label for=\"passwordVerif\">Confirmer password</label>
            <input type=\"password\" class=\"form-control\" id=\"passwordVerif\" name=\"passwordVerif\" minlength=\"6\" maxlength=\"20\" required>
        </div>
        <br>
        <button class=\"btn btn-primary\" type=\"submit\">Envoyer</button>";
    }
    if($_GET["password"]=="false"){
        echo "<div class='alert alert-danger' role='alert'>
                       Mot de passe incorrect
                      </div>";
    }
    ?>

    </form>
</div>
</body>
</html>