<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <form id="showcase" method='POST'>
        <div class="form-group">
        <label for="email" id="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Email" class="form-control" required/>
</div>
<div class="form-group">

        <label for="pass" id="pass">Mot de Passe</label>
        <input type="password" name="pass" id="pass" placeholder="Password" class="form-control"  required/>
</div>
<p>
<input type="submit" id="sub" value="Entrer" class="btn btn-primary" />
</p>
<a href="home.php" class="btn btn-primary">Retour</a>
</form>

<?php
session_start();
$sname= "localhost";

$unmae= "root";

$password = "Aj0297L0c0#";

$db_name = "gestion_clinique";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}

if (isset($_POST['email']) && isset($_POST['pass'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['email']);

    $pass = validate($_POST['pass']);

    if (empty($uname)) {

        header("Location: login.php?error=Email is required");

        exit();

    }else if(empty($pass)){

        header("Location: login.php?error=Password is required");

        exit();

    }else{
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $sql = "SELECT * FROM users WHERE Email='$uname' AND Mot_de_Passe='$pass'
        ";


        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['Email'] === $uname && $row['Mot_de_Passe'] === $pass && $row ['id_roles']== 1) {

                echo "Logged in!";

                $_SESSION['Email'] = $row['Email'];

                $_SESSION['Nom_Complet'] = $row['Nom_Complet'];

                $_SESSION['id_users'] = $row['id_users'];
                $_SESSION['id_roles'] = $row['id_roles'];

                header("Location: admin.php");

                exit();

            }else if ($row['Email'] === $uname && $row['Mot_de_Passe'] === $pass && $row ['id_roles']== 2) {

                echo "Logged in!";

                $_SESSION['Email'] = $row['Email'];

                $_SESSION['Nom_Complet'] = $row['Nom_Complet'];

                $_SESSION['id_users'] = $row['id_users'];
                $_SESSION['id_roles'] = $row['id_roles'];

                header("Location: secretariat.php");

                exit();

        }else{

            
            header("Location: Login.php");

            exit();

        }   

    }
}
}

?>
</body>

</html>