
<?php

if (isset($_POST["action"]) && $_POST["action"] === "getRowData") {
	getRowData();
}
if (isset($_POST["action"]) && $_POST["action"] === "delete" ) {
	deleteUser();
}
if(isset($_POST["search"])) {
	getMembreParId();
}



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

function getRowData(){
    require_once("./../DB/databaseRequests.php");

	$id = intval($_POST["id"]);

	$query = "SELECT users.* , connection.email, connection.pass
	FROM users
	INNER JOIN connection
	ON users.idUser = connection.idUser
	WHERE users.idUser = $id
	";

	$result = mysqli_query($connexion, $query);

	if ($result) {
		$row = mysqli_fetch_assoc($result);

		echo json_encode($row);
		exit;
	} else {
		echo json_encode(array("error" => "Could not retrieve row data."));
		exit;
	}
	
}


function deleteUser(){
    require_once("./../DB/databaseRequests.php");

	$id = intval($_POST["id"]);

	$query = "DELETE FROM users WHERE idUser= ?";
	$stmt = $connexion->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	
	mysqli_close($connexion);

	header("location:".$_SERVER['HTTP_REFERER']);
	
}

function getMembreParId(){
	
    require_once("./../DB/databaseRequests.php");

	$id = intval($_POST["id"]);

	$requete = "SELECT users.*, connection.email 
	FROM users INNER JOIN connection ON users.idUser = connection.idUser WHERE users.idUser =$id";

	if ($result = mysqli_query($connexion, $requete)) {
		if (mysqli_num_rows($result) > 0) {
		  $row = mysqli_fetch_assoc($result);
		  $email = $row["email"];
		  $first_name = $row["firstName"];
		  $last_name = $row["lastName"];
		  $response = array("email" => $email, "first_name" => $first_name, "last_name" => $last_name);
		  echo json_encode($response);
		} else {
			echo json_encode(array("error" => "No results found"));
		}
	  } else {
		$error = mysqli_error($connexion);
		echo json_encode(array($error));
	  }
}

function verifierUserProfil($id){
    require_once("server/DB/databaseRequests.php");

	$requete="SELECT profile.*, users.*  
	FROM profile INNER JOIN users ON users.idUser =profile.idUser WHERE users.idUser =?";

    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("i", $id);

    $stmt->execute();
    $result = $stmt->get_result();

    mysqli_close($connexion);

    return $result->fetch_object();
}



?>