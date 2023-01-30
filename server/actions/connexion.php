<?php

    require_once("../DB/databaseRequests.php");
    $courriel = $_POST['courrielc'];   
    $pass = $_POST['passc'];
	$id=0;

	$requete="SELECT * FROM connection WHERE email=? and password=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("ss", $courriel , $pass);
	$stmt->execute();
	$result = $stmt->get_result();
	if(!$ligne = $result->fetch_object()){
        $msg = "Le courriel ou le mdp est incorrect";
        header("Location: ../../conexion.php?msg=$msg");
		mysqli_close($connexion);
		exit;
	}else{
		session_start();
		$id = $ligne->idUser;
	}

    $requete="SELECT * FROM users WHERE idUser=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
    $ligne=mysqli_fetch_object($result);

	if($ligne->admin == 0){
		$msg = "le id est"."$id";
		header("Location: ../../membres.php?msg=$msg");
	} else{
		session_start();
		header("Location: ../../admin.php");
	}
	
    mysqli_close($connexion);
   
?>