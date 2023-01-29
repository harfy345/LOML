<?php
    require_once("../DB/databaseRequests.php");
    $prenom = $_POST['firstName'];
    $nom = $_POST['lastName'];
    $courriel = $_POST['email'];   
    $pass = $_POST['pass'];

    
    $uppercase = preg_match('@[A-Z]@', $pass);
    $lowercase = preg_match('@[a-z]@', $pass);
    $number = preg_match('@[0-9]@', $pass);

    if(!$uppercase || !$lowercase || !$number || strlen($pass) < 8) {
        $msg = "Courriel ".$courriel." doit avoir au moin un caractere majuscule et un chiffre";
        header("location:".$_SERVER['HTTP_REFERER']."?msg=$msg");
    }

    //vérifier si le courriel existe
	$requete="SELECT * FROM connection WHERE email=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("s", $courriel);
	$stmt->execute();
	$result = $stmt->get_result();
	if($ligne = $result->fetch_object()){
        $msg = "Courriel ".$courriel." existe deja";
        header("location:".$_SERVER['HTTP_REFERER']."?msg=$msg");
		mysqli_close($connexion);
		exit;
	}
    //enregistrer infos du membre
    $requete = "INSERT INTO users values(0,?,?,\"0\")";
    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("ss", $prenom, $nom );
    $stmt->execute();
    $id=$connexion->insert_id;

    //enregistre infos de connexion 
    $requete = "INSERT INTO connection values($id,?,?)";
    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("ss", $courriel, $pass);
    $stmt->execute();
 

    
    $msg = "Le membre ".$id." a été bien enregistré.";
    header("location:".$_SERVER['HTTP_REFERER']."?msg=$msg");

    mysqli_close($connexion);
?>