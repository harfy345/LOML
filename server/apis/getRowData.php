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
        case "change":
            $myClass->memberStatus();
            break;
        case "getRowDataProfil":
            $myClass->getRowDataProfil();
            break;
            
        default:
            break;
    }
}


?>