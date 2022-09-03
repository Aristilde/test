<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher la liste des medecins</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body> 
<h3> La LISTE COMPLETE DES MEDECINS</h3>

    <form method='POST'>
    </form>
    <table class="table">
        <tr >
            <th scope="col">Noms medecins</th>
            
                <th scope="col">Adresse</th>
                
                <th scope="col">Specialisations</th>
            

        </tr>
        <tr> <HR NOSHADE></tr>

      
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
        $reponse=$conn->query('SELECT * FROM medecins');

        while($donnee=$reponse->fetch()) {?>
            <tbody>
                <tr>
                    <td> <?= $donnee['nom_complet'] ?> </td>
                    
                    <td> <?= $donnee['adresse'] ?> </td>
                    
                    <td> <?= $donnee['specialisation'] ?> </td>
                   

                </tr>
                <tr> <HR NOSHADE></tr>
            </tbody>
            <?php }
       
    }

?>
</table>
<a href="admin.php" class="button">Retour</a>

</body>
</html>

