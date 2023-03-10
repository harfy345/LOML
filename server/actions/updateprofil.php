<?php
    require_once("./../apis/membre.php");

    
    $idUser = $_POST['idUser'];
    $prenom = $_POST['firstName'];
    $nom = $_POST['lastName'];
    $height = $_POST['height'];   
    $gender = $_POST['gender'];
    $typeRelation = $_POST['relation'];
    $bio = $_POST['bio'];
    $img = $_POST['img'];
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
        $membreapi = new MembreAPI();
        $membreapi->connect();

        $membreapi->updateProfilUser($idUser,$prenom,$nom,$height,$gender,$typeRelation,$image ? $image : $img,$bio);
    } catch(Exception $e){
        //Retourner le message voulu
    }finally {
        $membreapi->disconnect();
    }

   

   
    header("location:".$_SERVER['HTTP_REFERER']);



?>