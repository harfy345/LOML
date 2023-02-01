
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
?>