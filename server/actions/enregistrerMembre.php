<?php
    require_once("../DB/databaseRequests.php");
    $prenom = $_POST['firstName'];
    $nom = $_POST['lastName'];
    $courriel = $_POST['email'];   
    $pass = $_POST['pass'];
    $pass2= $_POST['pass2'];

 //******************************************************/

 // mettre le code dans des methodes server/api/membre

    if($pass != $pass2){
        $msg = "les mots de passe sont différent";
        header("Location: ../../sinscrire.php?msg=$msg");
        mysqli_close($connexion);
        exit;
    }
        
    //vérifier si le courriel existe
	$requete="SELECT * FROM connection WHERE email=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("s", $courriel);
	$stmt->execute();
	$result = $stmt->get_result();
	if($ligne = $result->fetch_object()){
        $msg = "Courriel ".$courriel." existe deja";
        header("Location: ../../sinscrire.php?msg=$msg");
		mysqli_close($connexion);
		exit;
	}
    //enregistrer infos du membre
    $requete = "INSERT INTO users values(0,?,?,\"0\",\"1\")";
    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("ss", $prenom, $nom );
    $stmt->execute();
    $id=$connexion->insert_id;

    //enregistre infos de connexion 
    $requete = "INSERT INTO connection values($id,?,?)";
    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("ss", $courriel, $pass);
    $stmt->execute();
 
    $msg = "vous avez bien été bien enregistré.";
    
    if(isset($_SESSION['username'])){
        header("Location: ../../admin.php");
    }
    else{
        header("Location: ../../conexion.php?msg=$msg");
    }

    mysqli_close($connexion);
?>