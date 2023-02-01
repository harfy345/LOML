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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class = "container" id = "contenu">

</div>


</body>
</html>

<?php

require_once("./public/util/footer.php");

?>