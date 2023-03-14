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

	function sendMessage($idUserSender, $idConvo, $idUserReciver, $contenu)
	{
		$requete = "INSERT INTO `messages` 
					(`idConversation`, `idSender`, `idReceiver`, `content`, `date`) 
					VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP);";
		$stmt = $this->connexion->prepare($requete);
		$stmt->bind_param("iiis", $idConvo, $idUserSender, $idUserReciver, $contenu);
		$stmt->execute();
	}

	function unmatch($idUserSender, $idUserReciever){
		$requete = "DELETE matchs , conversation
		FROM matchs 
		INNER JOIN conversation ON matchs.idUser1 =conversation.idUser1 
		AND matchs.idUser2 =conversation.idUser2 
		WHERE matchs.idUser1 = ? and matchs.idUser2 = ? OR matchs.idUser1 = ? and matchs.idUser2 = ?;";
		$stmt = $this->connexion->prepare($requete);
		$stmt->bind_param("iiii", $idUserSender, $idUserReciever, $idUserReciever, $idUserSender);
		$stmt->execute();
	}
	

	//Passer le id de convo
		

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
		
		$requete = "SELECT m.*, u1.firstName as firstName1, u2.firstName as firstName2, p1.picture as picture1, p2.picture as picture2
            FROM conversation m 
            INNER JOIN users u1 on m.idUser1 = u1.idUser 
            INNER JOIN users u2 on m.idUser2 = u2.idUser 
            LEFT JOIN profil p2 ON u2.idUser = p2.idUser
			LEFT JOIN profil p1 ON u1.idUser = p1.idUser
            WHERE u1.idUser = ? or u2.idUser = ?";

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

	public function getAllMessage() {
		$id = intval($_POST["id"]);

		$requete = "SELECT m.*, u.firstName, p.picture 
					FROM messages AS m
					JOIN users AS u ON m.idReceiver = u.idUser
					JOIN profil AS p ON u.idUser = p.idUser
					WHERE m.idConversation = $id;
					";



		$result = mysqli_query($this->connexion, $requete);	
	

		$messages = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$messages[] = $row;
		}
	
		if ($result) {
			echo json_encode($messages);
		} else {
			echo json_encode(array("error" => "Could not retrieve row data."));
		}
		exit;
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
		SET active = 1 WHERE idUser = ?;";
		$stmt = $this->connexion->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();

		
		header("location:" . $_SERVER['HTTP_REFERER']);
	}
	function memberStatusDesactive(){
		$id = intval($_POST["active"]);
		$query = "UPDATE users
		SET active = 0 WHERE idUser = ?;";
		$stmt = $this->connexion->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
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

	function updateProfilUser($idUser,$prenom,$nom,$height,$gender,$typeRelation,$image,$bio){
	

		$bio2 = $bio;
		$bio2 = mysqli_real_escape_string($this->connexion, $bio2);


		$requette = "UPDATE users, profil SET users.firstName = '$prenom', 
		users.lastName = '$nom',
		profil.height = $height, 
		profil.gender = $gender ,
		profil.typeRelation = '$typeRelation' ,
		profil.picture = '$image', 
		profil.bio = '$bio2' 
		
		WHERE users.idUser = profil.idUser AND users.idUser = $idUser";

		$stmt = $this->connexion->prepare($requette);
	
		$stmt -> execute();
		
	}

	function getSexLooking($id){

		$requete = "SELECT users.*, profil.sexLooking
		FROM users INNER JOIN profil ON users.idUser = profil.idUser WHERE users.idUser =?";

		$stmt = $this->connexion->prepare($requete);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();

		if ($result->num_rows == 0) {
			// id does not exist in database
			return null;
		} else {
			$row = $result->fetch_assoc();
			return $row["sexLooking"];
		}

	}


	function getProfilesToShow()
    {
        $id= intval($_POST['id']);
		
		$sexLooking = $this->getSexLooking($id);

		if($sexLooking != null){
			$requete = "SELECT profil.*, users.firstName FROM profil 
			INNER JOIN users ON users.idUser = profil.idUser 
			WHERE (profil.idUser NOT LIKE $id) AND profil.idUser NOT IN 
			(SELECT seenprofile.idUserSeen FROM seenprofile WHERE seenprofile.idUser = $id AND seenprofile.idUserSeen = seenprofile.idUserSeen) AND profil.gender = $sexLooking;";
		}else{
			$requete = "SELECT profil.*, users.firstName FROM profil 
			INNER JOIN users ON users.idUser = profil.idUser 
			WHERE (profil.idUser NOT LIKE $id) AND profil.idUser NOT IN 
			(SELECT seenprofile.idUserSeen FROM seenprofile WHERE seenprofile.idUser = $id AND seenprofile.idUserSeen = seenprofile.idUserSeen)";

		}

        $result = mysqli_query($this->connexion, $requete);


        $profiles = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $profiles[] = $row;
        }

        if (mysqli_num_rows($result) > 0) {
            echo json_encode($profiles);
        } else {
            echo json_encode(array("Il n'y plus d'utilisateur a aimer"));
        }
        exit;

        return $result->fetch_all();
    }


	function newLike(){
		$id= $_POST['id'];
		$idProfilLike = $_POST['idProfil'];

		$requete = "INSERT INTO `likes` (`idUser`, `idLikedUser`, `date`) VALUES (?, ?, CURRENT_TIMESTAMP);";
		$stmt = $this->connexion->prepare($requete);
		$stmt->bind_param("ii", $id, $idProfilLike);
		$stmt->execute();
	}

	function addNewSeenprofile(){
		$idUser= intval($_POST['id']);
		$idProfilSeen = intval($_POST['idProfil']);

		$requete = "INSERT INTO `seenprofile` (`idUser`, `idUserSeen`) VALUES (?, ?);";
		$stmt = $this->connexion->prepare($requete);
		$stmt->bind_param("ii", $idUser, $idProfilSeen);
		$stmt->execute();
	}


	function viewed(){
		$idUser1= intval($_POST['id1']);
		$idUser2= intval($_POST['id2']);

		$requette = "UPDATE matchs 
		SET viewed = 1 
		WHERE (idUser1 = $idUser1 AND idUser2 = $idUser2) OR (idUser1 = $idUser2 AND idUser2 = $idUser1)";

	
		$stmt = $this->connexion->prepare($requette);
	
		$stmt->execute();

	}

	function editPassword(){
        $new_password = $_POST['password'];
		$user_id= intval($_POST['id']);
 
        $requete = "UPDATE connection SET pass = '$new_password' WHERE idUser = $user_id ";

        $stmt = $this->connexion->prepare($requete);

        $stmt->execute();
		$msg = "Vous avez bien modifié le mot de passe.";
		header("Location: ../../conexion.php?msg=$msg");


    }

	function getRecoveryMail($email) {
		$requete = "SELECT idUser FROM connection WHERE email = ?";
		$stmt = $this->connexion->prepare($requete);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
	
		if ($result->num_rows == 0) {
			// Email does not exist in database
			return null;
		} else {
			$row = $result->fetch_assoc();
			return $row["idUser"];


		}
	}

}
