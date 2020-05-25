<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
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
    <h1>Bienvenue sur la page d'accueil</h1>
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Connectez-vous</h1>
                <br>
                <form action="controller.php?func=connect" method="post">
                    <div class="form-group">
                        <label for="login">Utilisateur</label>
                        <input type="text" class="form-control" id="login" name="login" minlength="4" maxlength="15">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" minlength="6" maxlength="20">
                    </div><br>
                    <button class="btn btn-primary" type="submit">Envoyer</button>
                </form><br>
                <?php
                if($_GET["login"]=="false" || $_GET["password"]=="false"){
                    echo "<div class='alert alert-danger' role='alert'>
                        Login ou mot de passe incorrect
                      </div>";
                }
                ?>
            </div>
            <div class="col">
                <h1>Inscrivez-vous</h1><br>
                <div class="col-md-8">
                    <p>Si vous n'êtes pas inscrit, cliquez sur le lien suivant :</p><br>
                    <a class="btn btn-primary" type="button" href="view-inscript.php">Inscription</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>