<?php
$pagetitre = "index";
require_once("./public/util/header.php");

// vous mettez ca dans une page que vous voulez pas que l'utilisateur ait acces sans connexion 

if (!session_id()) {
    header("location:./conexion.php");
}


?>
<div>hello admin</div>
<?php

require_once("./public/util/footer.php");

?>