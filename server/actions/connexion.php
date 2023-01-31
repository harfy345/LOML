<?php

    require_once("../DB/databaseRequests.php");
    $courriel = $_POST['courrielc'];   
    $pass = $_POST['passc'];
	$id=0;

	$requete="SELECT * FROM connection  WHERE email=? and pass=?";
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
		$_SESSION['username'] =$courriel ;
		
		$id = $ligne->idUser;
	}

    $requete="SELECT * FROM users WHERE idUser=?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
    $ligne=mysqli_fetch_object($result);

	if($ligne->admin == 0){
		session_start();
		$_SESSION['username'] =$courriel ;
		$_SESSION['isAdmin'] =false ;
		$msg = "le id est"."$id";

		header("Location: ../../membres.php?msg=$msg");
	} else{
		session_start();
		$_SESSION['username'] =$courriel ;
		$_SESSION['isAdmin'] =true ;
		header("Location: ../../admin.php");
	}

	$requete="SELECT  users.idUser, connection.email, connection.pass, users.admin FROM users INNER JOIN connection ON users.idUser =connection.idUser WHERE connection.email =? and connection.pass =?"
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("ss", $courriel , $pass);
	$stmt->execute();
	$result = $stmt->get_result();
	if(!$ligne = $result->fetch_object()){
   
	}else{
	
		echo $ligne-> email;
	}
	
    mysqli_close($connexion);

   
?>