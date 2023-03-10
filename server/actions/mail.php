<?php

require_once("../DB/databaseRequests.php");

$VotreAdresseMail="logic.newii@gmail.com";
if(empty($_POST['email'])) {
    echo "Le champ mail est vide";
} else {
        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i",$_POST['email'])){
            echo "L'adresse mail entrée est incorrecte";
        }else{
            if(empty($_POST['subject'])) {
                echo "Le champ sujet est vide";
            }else{
                if(empty($_POST['message'])) {
                    echo "Le champ message est vide";
                }else{
                    $Entetes = "MIME-Version: 1.0\r\n";
                    $Entetes .= "Content-type: text/html; charset=UTF-8\r\n";
                    $Entetes .= "From: LOML <".$_POST['email'].">\r\n";
                    $Entetes .= "Reply-To: LOML <".$_POST['email'].">\r\n";
                    $Mail=$_POST['email']; 
                    $Sujet='=?UTF-8?B?'.base64_encode($_POST['subject']).'?=';
                    $Message=htmlentities($_POST['message'],ENT_QUOTES,"UTF-8");
                if(mail($VotreAdresseMail,$Sujet,nl2br($Message),$Entetes)){
                        echo "L'émail à été envoyé avec succès!";
                        header("./contactUs.php");
                } else {
                    echo "Une erreur est survenue, le mail n'a pas été envoyé";
                    header("./contactUs.php");
                }
            }
        }
    }
}
?>
