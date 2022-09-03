<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Medecin</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
    <form method='POST' class="b">
        <div class="form-group">
<label for="name">Nom Complet</label>
<input type="text" name="name" id="name" class="form-control" required />
</div>
       <div class="form-group">
                    <label for="address"> Adresse</label>
                    <input type="text" name="address" id="address" class="form-control" required />
</div>
        <div class="form-group">
                    <label for="specialisation">Specialisation</label>
                    <input type="text" name="specialisation" id="specialisation" class="form-control" required />
</div>
        <div class="form-group">
                    <input type="submit" value="Envoyer" class="form-control" />

</div >
        <div class="form-group">
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
        $conn->exec("INSERT INTO medecins(nom_complet, adresse, specialisation) VALUES('$_POST[name]','$_POST[address]', '$_POST[specialisation]')");
        
        echo 'Utilisateurs ajoute avec succes ';
       
    }
?>
</body>
</html>