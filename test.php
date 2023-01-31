<?php
require_once("../DB/databaseRequests.php");

$requete="SELECT  users.idUser, connection.email, connection.pass, users.admin FROM users INNER JOIN connection ON users.idUser =connection.idUser WHERE connection.email =? and connection.pass =?"
$stmt = $connexion->prepare($requete);
$stmt->bind_param("ss", "ricardo@hotmail.com", "123");
$stmt->execute();
$result = $stmt->get_result();
if(!$ligne = $result->fetch_object()){

}else{

    echo $ligne-> email;
}

?>
