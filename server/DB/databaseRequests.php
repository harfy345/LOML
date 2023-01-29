<?php
define("SERVEUR","localhost");
define("USAGER","root");
define("PASSE","");
define("BD","loml");

$connexion = new mysqli(SERVEUR,USAGER,PASSE,BD);

if($connexion->connect_errno){
    echo "probleme de connexion au serveur de bd";
    exit();
}
?>