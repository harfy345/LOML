<?php
    $courriel = $_POST['courrielc'];   
    $pass = $_POST['passc'];
	$id=0;
	require_once("./../apis/membre.php");
	
    $courriel = $_POST['courrielc'];   
    $pass = $_POST['passc'];
	$id=0;

	$membre = getMembreParEmailMDP($courriel , $pass);

	if(!$membre){
		// si on le trouve pas dans la bd
		$msg = "Le courriel ou le mdp est incorrect";
        header("Location: ../../conexion.php?msg=$msg");
		
		exit;
	} 
		// si on le trouve
		session_start();

		$id=$membre->idUser;
		$_SESSION['username'] =$courriel ;
		$_SESSION['id'] =$membre->idUser ;

		$msg = "le id est"."$id";
		
		//si admin 
		if($membre->admin == 0){
			$_SESSION['isAdmin'] =false ;
			header("Location: ../../membre.php?msg=$msg");
		} else
		// si membre
		{
			$_SESSION['isAdmin'] =true ;
			header("Location: ../../admin.php?msg=$msg");
		}

	
   

   
?>