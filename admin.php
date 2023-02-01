<?php

session_start();

if(!isset($_SESSION['isAdmin']) || empty($_SESSION['isAdmin']) )  header("location:./conexion.php");

// vous mettez ca dans une page que vous voulez pas que l'utilisateur ait acces sans connexion 

if (!isset($_SESSION['username'])) {
    header("location:./conexion.php");
}

$pagetitre = "index";
require_once("./public/util/headeradmin.php");
?>

<div class = "container" id = "contenu">

</div>

<?php

require_once("./public/util/footer.php");

?>