<?php

require_once("./../apis/membre.php");

$idUserSender = $_POST['idUserSender'];
$idConvo = $_POST['idConvo'];
$idUserReciever = $_POST['idUserReciver'];   

$membreapi = new MembreAPI();
$membreapi->connect();
$membre = $membreapi->unmatch($idUserSender, $idUserReciever);
$membreapi->disconnect();

?>