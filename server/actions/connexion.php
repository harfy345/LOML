<?php

    require_once("../DB/databaseRequests.php");
    $courriel = $_POST['courrielc'];   
    $pass = $_POST['passc'];
    $membre = "A";


	$requete="SELECT * FROM connection WHERE email=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("s", $courriel);
	$stmt->execute();
	$result = $stmt->get_result();
	if(!$ligne = $result->fetch_object()){
        $msg = "Le courriel ".$courriel." est incorrect.";
        header("location:".$_SERVER['HTTP_REFERER']."?msg=$msg");
		mysqli_close($connexion);
		exit;
	}

    $requete="SELECT * FROM connection WHERE pass=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("s", $pass);
	$stmt->execute();
	$result = $stmt->get_result();
	if(!$ligne = $result->fetch_object()){
        $msg = "Le mot de passe est incorrect.";
        header("location:".$_SERVER['HTTP_REFERER']."?msg=$msg");
		mysqli_close($connexion);
		exit;
	}
    
    $requete="SELECT * FROM connection WHERE email=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("s", $courriel);
	$stmt->execute();
	$result = $stmt->get_result();
    $ligne=mysqli_fetch_object($result);

    if($ligne->admin == '0'){
        header("Location: ../../pages/membres.php");
    } else{
        header("Location: ../../pages/admin.php");
    }

    mysqli_close($connexion);
   
?>