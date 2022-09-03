<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
    <form method='POST' class="b">
    <div class="form-group">
    <label for="ok">
         Date de consultation: </label>
        <input type="date" name="ok" id="ok" class="form-control" required />
    
</div>
        <div class="form-group">
            <label for="consult"> Identifiant du patient</label>
            <input type="int" name="consult" id="consult" class="form-control" required />
</div>
<div class="form-group">
    <label for="consult1"> Identifiant du Medecin</label>
    <input type="int" name="consult1" id="consult1" class="form-control" required />
</div>

<div class="form-group">
    <label for="descript">Description</label>
    <textarea name="descript" id="descript" class="form-control"></textarea>
</div>
<input type="submit" class="btn btn-primary" value="envoyer" />
<a href="secretariat.php" class="btn btn-primary">Retour</a>
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
        $conn->exec("INSERT INTO consultations(date_consultation, id_patients, id_medecins, description_consultation ) VALUES('$_POST[ok]','$_POST[consult]','$_POST[consult1]','$_POST[descript]')");
        //$conn->exec("INSERT INTO medecins(nom_complet, adresse, specialisation) VALUES('valeur','valeur','valeur')");
        
        echo 'Consultation enregistre avec succes ';
       
    }
?>
</body>
</html>