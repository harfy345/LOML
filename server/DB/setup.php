<?php
 require_once("../DB/databaseRequests.php");
// Charger les données clients à partir du fichier JSON
$clients = json_decode(file_get_contents('clients.json'), true);

// Insérer chaque client dans la table "clients"
foreach ($clients as $client) {
  $idUser = $client['idUser'];
  $firstName = $client['firstName'];
  $lastName = $client['lastName'];
  $admin = $client['admin'];
  $active = $client['active'];
  $email = $client['email'];
  $pass = $client['pass'];
  $rank = $client['rank'];
  $age = $client['age'];
  $height = $client['height'];
  $gender = $client['gender'];
  $typeRelation = $client['typeRelation'];
  $bio = $client['bio'];
  $image = $client['image'];
  $sexLooking = null;

  $requete = "INSERT INTO users values(0,?,?,?,?)";
  $stmt = $connexion->prepare($requete);
  $stmt->bind_param("ssss", $firstName, $lastName,$admin,$active );
  $stmt->execute();
  $id=$connexion->insert_id;


  $requete = "INSERT INTO connection values($id,?,?)";
  $stmt = $connexion->prepare($requete);
  $stmt->bind_param("ss", $email, $pass);
  $stmt->execute();

  $requete = "INSERT INTO profil values($id,?,?,?,?,?,?,?,?)";
  $stmt = $connexion->prepare($requete);
  $stmt->bind_param("iiiissss", $rank, $age, $height, $gender, $typeRelation,$image, $bio, $sexLooking);
  $stmt->execute();

}
mysqli_close($connexion);
$msg = "les membres ont bien été ajouté";
header("Location: ../../conexion.php?msg=$msg");

?>
