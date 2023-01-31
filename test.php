<?php
require_once("./server/DB/databaseRequests.php");

$requete="SELECT  users.idUser, connection.email, connection.pass, users.admin 
FROM users INNER JOIN connection ON users.idUser =connection.idUser WHERE connection.email = 'ricardo@hotmail.com' and connection.pass ='123'";
$stmt = $connexion->prepare($requete);
$stmt->execute();
$result = $stmt->get_result();
if(!$ligne = $result->fetch_object()){
    // si on le trouve pas dans la bd

}else{
    // si on le trouve
    //si admin 
    // si membre
    echo $ligne-> email;
    echo $ligne-> pass;
}

?>
