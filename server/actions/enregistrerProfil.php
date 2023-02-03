<?php
    require_once("../DB/databaseRequests.php");
    session_start();

    $age = $_POST['age'];
    $height = $_POST['height'];   
    $gender = $_POST['gender'];
    $typeRelation = $_POST['relation'];
    $bio = $_POST['bio'];
    $picture = $_POST['picture'];
    $rank = 0;
    $id = $_SESSION['id'];

 //******************************************************/
 // mettre le code dans des methodes server/api/membre
    //enregistrer infos du profil

    $requete = "INSERT INTO profil values(?,?,?,?,?,?,?,?)";
    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("iiiiisss", $id, $rank, $age, $height, $gender, $typeRelation, $bio, $picture);
    $stmt->execute();
    $id=$connexion->insert_id;
 

    $_SESSION['getProfil'] = 1;

    /*

    $profil = getAllProfilPourUser($id);
    
    //genre
    if ($profil->gender == "1") {
        $_SESSION['gender'] = 'une femme';
    }elseif ($profil->gender == "2"){
        $_SESSION['gender'] = 'un homme';
    }else{
        $_SESSION['gender'] = "non Binaire";
    }

    //type Relation
    if ($profil->typeRelation == "serieux") {
        $_SESSION['typeRelationUser'] = 'relation sérieuse';
        $_SESSION['imageTypeRelation'] = "";
    }elseif ($profil->typeRelation == "rien"){
        $_SESSION['typeRelationUser'] = 'Rien de sérieux';
        $_SESSION['imageTypeRelation'] = "";
    }elseif ($profil->typeRelation == "friend"){
        $_SESSION['typeRelationUser'] = 'sex friend';
        $_SESSION['imageTypeRelation'] = "";
    }else{
        $_SESSION['typeRelationUser'] = "Coup d'un soir";
        $_SESSION['imageTypeRelation'] = "";
    }

    $_SESSION['ageUser'] = $profil->age + " ans";
    $_SESSION['heightUser'] = $profil->height + " cm";
    $_SESSION['bioUser'] = $profil->bio;
    $_SESSION['pictureUser'] = $profil->picture;

    */

    $msg = "Vous avez bien enregistré le profil.";
    header("Location: ../../membre.php?msg=$msg");
    mysqli_close($connexion);
?>