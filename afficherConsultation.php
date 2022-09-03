<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher la liste des consultations</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
    <h3> La LISTE COMPLETE DES CONSULTATIONS</h3>

    <form method='POST'>
    <table  class="table">
        <tr >
            <th scope="col">Date Consultation</th>
            
            <th scope="col">ID Patients</th>
            
            <th scope="col">ID Medecins</th>
           
            <th scope="col">Description de la consultation</th>
           

        </tr>
       
        <div class="form-group">
        <a href="secretariat.php" class="btn btn-primary">Retour</a>
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
        $reponse=$conn->query('SELECT * FROM consultations');
        while($donnee=$reponse->fetch()) {?>
            <tbody>
                <tr>
                    <td> <?= $donnee['date_consultation'] ?> </td>
                    
                    <td> <?= $donnee['id_patients'] ?> </td>
                    
                    <td> <?= $donnee['id_medecins'] ?> </td>
                    
                    <td> <?= $donnee['description_consultation'] ?> </td>
                </tr>
            </tbody>
            <?php }
    //echo 'Le nom complet du patient est: ' .$donnee['nom_complet']. ' et il souffre de : '.$donnee['maladies'];
       
    }
?>
</table>
<a href="admin.php" class="button">Retour</a>

</body>
</html>

