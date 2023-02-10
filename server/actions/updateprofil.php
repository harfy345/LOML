<?php
    require_once("./../apis/membre.php");

    
    $idUser = $_POST['idUser'];
    $prenom = $_POST['firstName'];
    $nom = $_POST['lastName'];
    $height = $_POST['height'];   
    $gender = $_POST['gender'];
    $typeRelation = $_POST['relation'];
    $bio = $_POST['bio'];

    $membreapi = new MembreAPI();
    $membreapi->connect();
    $membreapi->updateProfilUser($idUser,$prenom,$nom,$height,$gender,$typeRelation,$bio);
    $membreapi->disconnect();
    header("location:".$_SERVER['HTTP_REFERER']);



?>