<?php


require_once("./../apis/membre.php");

$idUserSender = $_POST['idUserSender'];
$idConvo = $_POST['idConvo'];
$idUserReciver = $_POST['idUserReciver'];
$contenu = $_POST['contenu'];   



$membreapi = new MembreAPI();
$membreapi->connect();
$membre = $membreapi->sendMessage($idUserSender,$idConvo, $idUserReciver, $contenu);
$membreapi->disconnect();