<?php

session_start();

// vous mettez ca dans une page que vous voulez pas que l'utilisateur ait acces sans connexion 
if (!isset($_SESSION['username'])) {
    header("location:./conexion.php");
}

$pagetitre = "index";
require_once("./public/util/headerAdminetMembre.php");
?>
<div>hello membre</div>
<?php

require_once("./public/util/footer.php");

?>