<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire patient</title>
    <link rel="stylesheet"  ></head>
<body>
    <form method='POST'>
        <div class="form-group">
            <label for="name">Nom Complet</label>
            <input type="text" name="name" id="name" class="form-control"  required />
</div>
<div class="form-group">
    <label for="maladies">Maladies</label>
    <input type="text" name="maladies" id="maladies" class="form-control"  required />
</div>
<div class="form-group">
    <input type="submit" value="Envoyer"class="form-control"  />
</div>
<div>
<a href="admin.php" class="btn btn-primary">Retour</a>
</div>
</form>
<?php
$servername = 'localhost';
$username = 'root';
$passwrd = 'Aj0297L0c0#';
$conn =null;
//on  etablie la connexion

try{
$conn =new PDO("mysql:host =$servername; dbname=gestion_clinique", $username, $passwrd);
//defini le mode d'erreur
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo 'Connexion reussie  ' ;
}
catch(PDOException $e){
echo"Erreur : " .$e->getMessage();
}

    if(isset($_POST)){
        extract($_POST);
        $conn->exec("INSERT INTO patients(nom_complet, maladies) VALUES('$_POST[name]','$_POST[maladies]')");
        //$conn->exec("INSERT INTO medecins(nom_complet, adresse, specialisation) VALUES('valeur','valeur','valeur')");
        
        echo 'Utilisateurs ajoute avec succes ';
       
    }
?>

</body>
</html>