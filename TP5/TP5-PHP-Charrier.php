<html lang="fr">
<head>
    <title>Celsius en Degré</title>
</head>
<body>
<h1>Exercice 1</h1>
<a href="TP5-PHP-Charrier.php/?far=12">Cliquer pour avoir la valeur en degré</a>
<form method='get'>
    Valeur en Farhenheit : <input type='text' name='farh'>
    <input type='submit' value='convertir' />
</form>
<?php
if($_POST["farh"]!=NULL){
    echo "La valeur en degré est " . (($_POST["farh"] - 32) * 5 / 9)."<br>";
}
if($_GET["far"]!=NULL) {
    echo "La valeur en degré est " . (($_GET["far"] - 32) * 5 / 9)."<br>";
}
?>
<h1>Exercice 2</h1>
<form method="post">
    Nom : <input type="text" name="nom" value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>">
    Prénom : <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>">
    <br>
    <br>
    Débutant :
    <input type='radio' name="niveau" value="Debutant" <?php if($_POST['niveau']=="Debutant"){echo checked;} ?>>
    Avancé :
    <input type='radio' name="niveau" value="Avance" <?php if($_POST['niveau']=="Avance"){echo checked;} ?>>
    <br>
    <br>
    <input type='reset' name ='effacer' value='Effacer'/>
    <input type='submit' value='Envoyer'/>
</form>
<?php
if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["niveau"])) {
    echo "Bonjour " . $_POST["nom"] . " " . $_POST["prenom"] . ". Vous avez un niveau " . $_POST["niveau"] . ".";
}
?>
<h1>Exercice 3</h1>
<form method="post">
    Nom : <input type="text" name="nom" value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];} ?>">
    Prénom : <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>">
    Age : <input type="text" name="age" value="<?php if(isset($_POST['age'])){echo $_POST['age'];} ?>">
    <br>
    <br>
    Langues pratiquées(choisir au minimum 2)
    <br>
    <select name="langues[]" multiple="multiple">
        <option value="français" <?php for($i=0;$i<4;$i++){if($_POST['langues'][$i]=="français"){echo selected;}} ?>> français</option>
        <option value="anglais" <?php for($i=0;$i<4;$i++){if($_POST['langues'][$i]=="anglais"){echo selected;}} ?>> anglais</option>
        <option value="allemand" <?php for($i=0;$i<4;$i++){if($_POST['langues'][$i]=="allemand"){echo selected;}} ?>> allemand</option>
        <option value="espagnol" <?php for($i=0;$i<4;$i++){if($_POST['langues'][$i]=="espagnol"){echo selected;}} ?>> espagnol</option>
    </select><br>
    <br>
    Compétences Informatiques(choisir au minimum 2)
    <br>
    HTML
    <input type='checkbox' name='info[]' value="HTML" <?php for($i=0;$i<8;$i++){if($_POST['info'][$i]=="HTML"){echo checked;}} ?>>
    CSS
    <input type='checkbox' name='info[]' value="CSS" <?php for($i=0;$i<8;$i++){if($_POST['info'][$i]=="CSS"){echo checked;}} ?>>
    PHP
    <input type='checkbox' name='info[]' value="PHP" <?php for($i=0;$i<8;$i++){if($_POST['info'][$i]=="PHP"){echo checked;}} ?>>
    SQL
    <input type='checkbox' name='info[]' value="SQL" <?php for($i=0;$i<8;$i++){if($_POST['info'][$i]=="SQL"){echo checked;}} ?>>
    C
    <input type='checkbox' name='info[]' value="C" <?php for($i=0;$i<8;$i++){if($_POST['info'][$i]=="C"){echo checked;}} ?>>
    C++
    <input type='checkbox' name='info[]' value="C++" <?php for($i=0;$i<8;$i++){if($_POST['info'][$i]=="C++"){echo checked;}} ?>>
    JS
    <input type='checkbox' name='info[]' value="JS" <?php for($i=0;$i<8;$i++){if($_POST['info'][$i]=="JS"){echo checked;}} ?>>
    Python
    <input type='checkbox' name='info[]' value="Python" <?php for($i=0;$i<8;$i++){if($_POST['info'][$i]=="Python"){echo checked;}} ?>>
    <br>
    <br>
    <input type='reset' value='Effacer'/>
    <input type='submit' value='Envoyer'/>
</form>
<?php
if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["age"]) && isset($_POST["langues"][1]) && isset($_POST["info"][1])) {
    echo "Bonjour " . $_POST["nom"] . " " . $_POST["prenom"] . ". Vous avez " . $_POST["age"] . " ans.<br>";
    echo "Vous parlez : <br>";
    foreach ($_POST["langues"] as $val) {
        echo "-$val<br>";
    }

    echo "Vous avez des compétences informatiques en :<br>";
    foreach ($_POST["info"] as $val) {
        echo "-$val<br>";
    }
}
?>

<h1>Exercice 4</h1>
<form method="post">
    <div>
        Nombre 1  <input type="text" name="nb1" value="<?php if(isset($_POST['nb1'])){echo $_POST['nb1'];} ?>"><br>
        Nombre 2  <input type="text" name="nb2" value="<?php if(isset($_POST['nb2'])){echo $_POST['nb2'];} ?>"><br>
        Resultat  <input type="text" name="result" value="<?php
        if(isset($_POST["nb1"]) && isset($_POST["nb2"])){
            switch ($_POST["but"]){
                case "add" : $result = $_POST["nb1"] + $_POST["nb2"];
                    break;
                case "diff" : $result = $_POST["nb1"] - $_POST["nb2"];
                    break;
                case "div" : if($_POST["nb2"]!=0){$result = $_POST["nb1"] / $_POST["nb2"];} else{echo "Division par zéro";}
                    break;
                case "pow" : $result = pow($_POST["nb1"], $_POST["nb2"]);
                    break;
            }
            echo $result;
        }
        ?>"></div><br>
    Cliquez sur un bouton !
    <button name="but" value="add">Addition x+y</button>
    <button name="but" value="diff">Soustraction x-y</button>
    <button name="but" value="div">Division x/y</button>
    <button name="but" value="pow">Puissance x^y</button>
</form>

<h1>Exercice 5</h1>
<form method="post" enctype="multipart/form-data">
    <p>
        Fichier 1 <input type="file" name="fichier1"><br>
        Fichier 2 <input type="file" name="fichier2"><br>
        <input type="submit" value="Envoi">
    </p>
</form>
<?php
move_uploaded_file($_FILES["fichier1"]["tmp_name"],"/mnt/c/Users/ychar/PHP/TP5/image1.jpg");
move_uploaded_file($_FILES["fichier2"]["tmp_name"],"/mnt/c/Users/ychar/PHP/TP5/image2.jpg");
if(isset($_FILES["fichier1"]) && isset($_FILES["fichier2"])){
    echo"<table border='1px solid black'>
    <thead>
        <tr>
            <td></td>
            <td>Fichier 1</td>
            <td>Fichier 2</td>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>name</td>
        <td>".$_FILES["fichier1"]["name"]."</td>
<td>".$_FILES["fichier2"]["name"]."</td>
</tr>
<tr>
    <td>type</td>
    <td>".$_FILES["fichier1"]["type"]."</td>
    <td>".$_FILES["fichier2"]["type"]."</td>
</tr>
<tr>
    <td>tmp_name</td>
    <td>".$_FILES["fichier1"]["tmp_name"]."</td>
    <td>".$_FILES["fichier2"]["tmp_name"]."</td>
</tr>
<tr>
    <td>error</td>
    <td>".$_FILES["fichier1"]["error"]."</td>
    <td>".$_FILES["fichier2"]["error"]."</td>
</tr>
<tr>
    <td>size</td>
    <td>".$_FILES["fichier1"]["size"]."</td>
    <td>". $_FILES["fichier2"]["size"]."</td>
</tr>
<tr>
    <td>image</td>
    <td><img src='image1.jpg' alt='image1'></td>
    <td><img src='image2.jpg' alt='image2'></td>
</tr>
</tbody>
</table>";
}
?>

<h1>Exercice 7</h1>
<?php
setcookie("cookie0","test0");
setcookie("cookie1","test1",time()+(60*60*24*14));
echo "cookie0 : ".$_COOKIE["cookie0"]."<br> cookie1 : ".$_COOKIE["cookie1"];
setcookie("cookie0");
setcookie("cookie1");
echo "<br>cookie0 : ".$_COOKIE["cookie0"]."<br> cookie1 : ".$_COOKIE["cookie1"];
?>

<h1>Exercice 8</h1>
<?php
$array = array(
    array("cookieN","cookieL","cookieB"),
    array("cookie chocolat noir","cookie chocolat au lait","cookie chocolat blanc"));
for($i=0;$i<3;$i++){
    setcookie($array[0][$i],$array[1][$i]);
}
echo "cookieN : ".$_COOKIE["cookieN"]."<br> cookieL : ".$_COOKIE["cookieL"]."<br> cookieB : ".$_COOKIE["cookieB"];
?>

<h1>Exercice 9</h1>
<?php
session_start();
echo session_id();
$_SESSION['Session']="MaSession";
?>
</body>
</html>
