<?php
require_once('membre.php');

if (isset($_POST["action"])) {
    $myClass = new MembreAPI();
    switch ($_POST["action"]) {
        case "search":
            $myClass->getMembreParId();
            break;
        case "delete":
            $myClass->deleteUser();
            break;
        case "getRowData":
            $myClass->getRowData();
            break;
        case "changeActive":
            $myClass->memberStatus();
            break;
        case "changeDeactive":
            $myClass->memberStatusDesactive();
            break;
        case "getRowDataProfil":
            $myClass->getRowDataProfil();
            break;
        case "getAllMessage":
            $myClass->getAllMessage();
            break;
        case "addLike":
            $myClass->addLike();
            break;
        case "addSeen":
            $myClass->addSeen();
            break;
        case "getAllProfil":
            $myClass->getAllProfil();
            break;
            
        default:
            break;
    }
}


?>