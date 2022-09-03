<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secretariat</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
    <form method='POST' class="b">
        
        <div  class="form-group"  >
            <label for="name" >Nom Complet</label>
            <input type="text" name="name" id="name" class="form-control" required />
</div>
<div  class="form-group" >
    <label for="email"> Email </label>
    <input type="text" name="email" id="email" class="form-control" required />
</div>
<div class="form-group"  >
    <label for="pass"> Mot de passe </label>
    <input type="password" name ="pass" id="pass" class="form-control" required />
</div>

<div class="form-group">
    <label for="name1">Titre</label>
    <select name="role" id="role" class="form-control">
    <option value = "1"> Administrateur</option>
    <option value="2">Secretaire</option>
</select>
</div>

<div align="center">
<input type="submit" class="btn btn-primary" value="Enregistrer" href="role.php" >
</div>

<a href="admin.php" class="btn btn-primary">Retour</a>
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
        $conn->exec("INSERT INTO users(Nom_Complet, Email, Mot_de_Passe, id_roles) VALUES('$_POST[name]','$_POST[email]','$_POST[pass]','$_POST[role]')");
        //$conn->exec("INSERT INTO medecins(nom_complet, adresse, specialisation) VALUES('valeur','valeur','valeur')");
        
        echo 'Utilisateurs ajoute avec succes ';
       
    }
?>
</form>
</body>
</html>