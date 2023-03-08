<?php
session_start();
if (isset($_SESSION['username'])) {
  header("location:./membre.php");
}
$_SESSION['active_page'] = 'home';
$pagetitre = "index";
require_once("./public/util/header.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body class="gb-index">


<div class="d-flex justify-content-center my-auto w-100 h-100 div-inside-inscrire menu-index-animation"> 
    
    <section class="text-center div-index-inside">
        <div class="container div-index">
          <img class="menu-text-index-animation" src="public\images\Logo-partern-white.png" alt="">
          <h1 class="jumbotron-heading menu-text-index-animation">Bienvenue sur notre de site de rencontre</h1>
          <h2 class="lead text-muted menu-text-index-animation">Love of my life</h2>
          <p>
            <button class="btn btn-dark col-3 btn-design-index" onClick="location.href = 'sinscrire.php';">S'inscrire</button>
            <button class="btn btn-dark col-3 btn-design-index" onClick="location.href = 'conexion.php';">Se connecter</button>
          </p>
        </div>
      </section>
</div>
   
  
</body>
</html>




<?php

require_once("./public/util/footer.php");

?>