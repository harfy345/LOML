
<?php
function getMembreParEmailMDP($courriel, $pass){
    require_once("./../DB/databaseRequests.php");

	$requete="SELECT users.idUser, connection.email, connection.pass, users.admin 
	FROM users INNER JOIN connection ON users.idUser =connection.idUser WHERE connection.email =? and connection.pass =?";
  
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("ss", $courriel , $pass);
	$stmt->execute();
	$result = $stmt->get_result();
    
    mysqli_close($connexion);
    return $result->fetch_object();
    
}
function getAllLikesPourMembre($id){
    require_once("./../DB/databaseRequests.php");

	$requete="SELECT * 
	FROM likes WHERE idUser =? ";
  
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
    
    mysqli_close($connexion);
    return $result->fetch_all();
    
}
function getAllMatchesPourUser($id){
    require_once("./../DB/databaseRequests.php");

	$requete="SELECT * 
	FROM matchs WHERE idUser =? ";
  
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
    
    mysqli_close($connexion);
    return $result->fetch_all();
    
}

function membreIsAdmin($id){
    require_once("./../DB/databaseRequests.php");

	$requete="SELECT admin
	FROM users WHERE idUser =?";
  
	$stmt = $connexion->prepare($requete);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
    
    mysqli_close($connexion);
    return $result->fetch_object();
}

function getAllMembres(){
    require_once("server/DB/databaseRequests.php");

	$requete="SELECT users.* , connection.email, connection.pass
	FROM users INNER JOIN connection ON users.idUser =connection.idUser";
  
  	$result = mysqli_query($connexion, $requete);

    mysqli_close($connexion);

    return $result->fetch_all();
}
?>