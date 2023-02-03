<?php
    require_once("../DB/databaseRequests.php");

    $idUser = $_POST['idUser'];
    $prenom = $_POST['firstName'];
    $nom = $_POST['lastName'];
    $courriel = $_POST['email'];   
    $pass = $_POST['pass'];


    $requette = "UPDATE users, connection SET users.firstName = '$prenom', 
    users.lastName = '$nom',
    connection.email = '$courriel', 
    connection.pass = '$pass' 
    WHERE users.idUser = connection.idUser AND users.idUser = $idUser";

    $stmt = $connexion->prepare($requette);

    $stmt->execute();
    header("location:".$_SERVER['HTTP_REFERER']);

    mysqli_close($connexion);

?>