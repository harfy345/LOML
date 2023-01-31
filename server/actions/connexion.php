<?php
    require_once("../DB/databaseRequests.php");
    $courriel = $_POST['courrielc'];   
    $pass = $_POST['passc'];
	$id=0;

	$requete="SELECT  users.idUser, connection.email, connection.pass, users.admin 
	FROM users INNER JOIN connection ON users.idUser =connection.idUser WHERE connection.email = ? and connection.pass =?";
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("ss", $courriel , $pass);
	$stmt->execute();
	$result = $stmt->get_result();
	if(!$ligne = $result->fetch_object()){
		// si on le trouve pas dans la bd
		$msg = "Le courriel ou le mdp est incorrect";
        header("Location: ../../conexion.php?msg=$msg");
		mysqli_close($connexion);
		exit;
	}else{
		// si on le trouve
		session_start();
		$_SESSION['username'] =$courriel ;
		$msg = "le id est"."$id";
		//si admin 
		if($ligne->admin == 0){
			$_SESSION['isAdmin'] =false ;
			header("Location: ../../membre.php?msg=$msg");
		}
		// si membre
		if(!$ligne->admin == 0){
			$_SESSION['isAdmin'] =true ;
			header("Location: ../../admin.php?msg=$msg");
		}
	}
	
    mysqli_close($connexion);

   
?>