<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher la liste des utilisateurs</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
<h3> La LISTE COMPLETE DES UTILISATEURS</h3>

    <form method='POST'>

</form>
<table class="table">
        <tr >
            <th scope="col">Noms des utilisateurs</th>
            
            <th scope="col">Emails</th>
            
            <th scope="col">Roles</th>

        </tr>
        <div class="form-group">
        <a href="admin.php" class="btn btn-primary">Retour</a>
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
        $reponse=$conn->query('SELECT * FROM users');
        while($donnee=$reponse->fetch()) {?>
            <tbody>
                <tr>
                    <td> <?= $donnee['Nom_Complet'] ?> </td>
                   
                    <td> <?= $donnee['Email'] ?> </td>
                    
                    <td> <?= $donnee['id_roles'] ?> </td>
                    

                </tr>
            </tbody>
            <?php }
       
    }

?>
</table>
</body>
</html>
