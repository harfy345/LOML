<?php

class MembreAPI
{


	
	private $connexion;

	public function __construct()
	{
		define("SERVEUR", "localhost");
		define("USAGER", "root");
		define("PASSE", "");
		define("BD", "loml");

		$this->connexion = new mysqli(SERVEUR, USAGER, PASSE, BD);

		if ($this->connexion->connect_errno) {
			echo "probleme de connexion au serveur de bd";
			exit();
		}
	}

	public function connect()
	{
		$this->connexion->connect(SERVEUR, USAGER, PASSE, BD);
		if ($this->connexion->connect_errno) {
			echo "probleme de connexion au serveur de bd";
			exit();
		}
	}
	public function disconnect()
	{
		mysqli_close($this->connexion);
	}
	public function __destruct()
	{
		$this->connexion = null;
	}

	public function getMembreParEmailMDP($courriel, $pass)
	{
		$requete = "SELECT users.idUser, connection.email, connection.pass, users.admin 
	FROM users INNER JOIN connection ON users.idUser =connection.idUser WHERE connection.email =? and connection.pass =?";

		$stmt = $this->connexion->prepare($requete);
		$stmt->bind_param("ss", $courriel, $pass);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_object();
	}
	function getAllLikesPourMembre($id)
	{
		$requete = "SELECT * 
		FROM likes WHERE idUser =? ";

		$stmt = $this->connexion->prepare($requete);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all();
	}

	function getProfilesToShow($id)
	{
		$requete = "SELECT * from users u WHERE idUser not IN (SELECT idUserSeen FROM seenprofile sp where sp.idUserSeen=u.idUser and sp.idUser=?)";

		$stmt = $this->connexion->prepare($requete);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_all();
	}

	// SELECT m.* , u1.firstName as user1Name , u2.firstName as user2Name
    //     FROM matchs m INNER JOIN users u1 on m.idUser1 = u1.idUser join users u2 on m.idUser2 = u2.idUser

	public function getAllMatchesPourUser($id)
	{
		$requete = "SELECT m.* , u1.firstName as firstName1 , u2.firstName as firstName2
        FROM matchs m INNER JOIN users u1 on m.idUser1 = u1.idUser join users u2 on m.idUser2 = u2.idUser where u1.idUser = ? or u2.idUser = ?" ;


		$stmt = $this->connexion->prepare($requete);
		$stmt->bind_param("ii", $id,$id);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result;
	}	

	public function getAllConvosPourUser($id)
	{
		$requete = "SELECT m.* , u1.firstName as firstName1 , u2.firstName as firstName2
        FROM conversation m INNER JOIN users u1 on m.idUser1 = u1.idUser join users u2 on m.idUser2 = u2.idUser where u1.idUser = ? or u2.idUser = ?" ;

		$stmt = $this->connexion->prepare($requete);
		$stmt->bind_param("ii", $id,$id);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result;
	}

	function membreIsAdmin($id)
	{
		$requete = "SELECT admin
	FROM users WHERE idUser =?";

		$stmt = $this->connexion->prepare($requete);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result->fetch_object();
	}

	function getAllMembres()
	{
		$requete = "SELECT users.* , connection.email, connection.pass
	FROM users INNER JOIN connection ON users.idUser =connection.idUser";

		$result = mysqli_query($this->connexion, $requete);


		return $result->fetch_all();
	}

	function getRowData()
	{
		$id = intval($_POST["id"]);

		$query = "SELECT users.* , connection.email, connection.pass
		FROM users
		INNER JOIN connection
		ON users.idUser = connection.idUser
		WHERE users.idUser = $id
	";

		$result = mysqli_query($this->connexion, $query);

		if ($result) {
			$row = mysqli_fetch_assoc($result);

			echo json_encode($row);
			exit;
		} else {
			echo json_encode(array("error" => "Could not retrieve row data."));
			exit;
		}
	}

	function getRowDataProfil()
	{
		$id = intval($_POST["id"]);

		$query = "SELECT users.*, connection.email, connection.pass, profil.*
		FROM users
		INNER JOIN connection
		ON users.idUser = connection.idUser
		INNER JOIN profil
		ON users.idUser = profil.idUser
		WHERE users.idUser = $id;
		
	";

		$result = mysqli_query($this->connexion, $query);

		if ($result) {
			$row = mysqli_fetch_assoc($result);

			echo json_encode($row);
			exit;
		} else {
			echo json_encode(array("error" => "Could not retrieve row data."));
			exit;
		}
	}


	function deleteUser()
	{
		$id = intval($_POST["id"]);

		$query = "DELETE FROM users WHERE idUser= ?";
		$stmt = $this->connexion->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();


		header("location:" . $_SERVER['HTTP_REFERER']);
	}
	function memberStatus()
	{
		$id = intval($_POST["active"]);
		
		$query = "UPDATE users
		SET active = CASE WHEN active = 1 THEN 0 ELSE 1 END
		WHERE idUser = ?;";
		$stmt = $this->connexion->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();


		header("location:" . $_SERVER['HTTP_REFERER']);
	}


	function getMembreParId()
	{

		$id = intval($_POST["id"]);

		$requete = "SELECT users.*, connection.email 
	FROM users INNER JOIN connection ON users.idUser = connection.idUser WHERE users.idUser =$id";

		if ($result = mysqli_query($this->connexion, $requete)) {
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
			$error = mysqli_error($this->connexion);
			echo json_encode(array($error));
		}
	}

	function verifierUserProfil($id)
	{
		$requete = "SELECT profil.*, users.*  
		FROM profil INNER JOIN users ON users.idUser =profil.idUser WHERE users.idUser =?";

		$stmt = $this->connexion->prepare($requete);
		$stmt->bind_param("i", $id);

		$stmt->execute();
		$result = $stmt->get_result();


		return $result->fetch_object();
	}

	function verifierUserActive($id)
	{
		$requete = "SELECT active FROM users WHERE idUser = $id";
		$result = mysqli_query($this->connexion, $requete);

		return $result->fetch_object();
	}


	function listerMembre(){
		$requete="SELECT users.* , connection.email, connection.pass
		FROM users INNER JOIN connection ON users.idUser =connection.idUser";
		
		$result = mysqli_query($this->connexion, $requete);

		return $result;
	}

	function updateProfilUser($idUser,$prenom,$nom,$height,$gender,$typeRelation,$bio){
	

		$bio2 = $bio;
		$bio2 = mysqli_real_escape_string($this->connexion, $bio2);


		$requette = "UPDATE users, profil SET users.firstName = '$prenom', 
		users.lastName = '$nom',
		profil.height = $height, 
		profil.gender = $gender ,
		profil.typeRelation = '$typeRelation' ,
		profil.bio = '$bio2' 
		
		WHERE users.idUser = profil.idUser AND users.idUser = $idUser";

		$stmt = $this->connexion->prepare($requette);
	
		$stmt -> execute();
		
	}
}
