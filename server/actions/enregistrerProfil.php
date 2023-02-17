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


    $dossier="../photosMembres/";
    if($_FILES['picture']['tmp_name']!==""){
        $nomImage=sha1($nom.time());
        $tmp = $_FILES['picture']['tmp_name'];
        $fichier= $_FILES['picture']['name'];
        $extension=strrchr($fichier,'.');
        @move_uploaded_file($tmp,$dossier.$nomImage.$extension);
        @unlink($tmp); 
        $image=$nomImage.$extension;
    }
    try{
        $requete = "INSERT INTO profil values($id,?,?,?,?,?,?,?)";
        $stmt = $connexion->prepare($requete);
        $stmt->bind_param("iiiisss", $rank, $age, $height, $gender, $typeRelation,$image, $bio);
        $stmt->execute();
        $id=$connexion->insert_id;

    } catch(Exception $e){
        //Retourner le message voulu
    }finally {
        mysqli_close($connexion);
    }



    $msg = "Vous avez bien enregistré le profil.";
    header("Location: ../../membre.php?msg=$msg");

?>