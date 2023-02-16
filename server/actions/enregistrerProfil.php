<?php
    require_once("../DB/databaseRequests.php");
    session_start();

    $id = $_SESSION['id'];
    $rank = 0;
    $age = $_POST['age'];
    $height = $_POST['height'];   
    $gender = $_POST['gender'];
    $typeRelation = $_POST['relation'];
    $bio = $_POST['bio'];
    $picture = $_POST['picture'];


    $requete = "INSERT INTO profil values($id,?,?,?,?,?,?,?)";
    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("iiiisss", $rank, $age, $height, $gender, $typeRelation,$picture, $bio);
    $stmt->execute();
    $id=$connexion->insert_id;

    $msg = "Vous avez bien enregistré le profil.";
    header("Location: ../../membre.php?msg=$msg");
    mysqli_close($connexion);
?>