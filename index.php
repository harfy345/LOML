<?php
if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
 
} else {
  $msg = "";
}
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
          <h2 class="lead text-muted menu-text-index-animation">Focaliser vous sur ce que la personne a offir et non sur l'apparence.</h2>
          <p>
            <button class="btn btn-dark col-3 btn-design-index" onClick="location.href = 'sinscrire.php';">S'inscrire</button>
            <button class="btn btn-dark col-3 btn-design-index" onClick="location.href = 'conexion.php';">Se connecter</button>
          </p>
        </div>
      </section>
</div>
   
  
</body>
</html>


<!-- Afficher le toast de la connection-->
<div class="toast-container posToast" style="margin:0 0 0 20px !important; top:20px;">
  <div id="toast" class="toast  align-items-center text-white bg-danger border-0" data-bs-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="public/images/message.png" width=24 height=24 class="rounded me-2" alt="message">
      <strong class="me-auto">Messages</strong>
      <small class="text-muted"></small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div id="textToast" class="toast-body">
    </div>
  </div>
</div>
</div>


<?php

require_once("./public/util/footer.php");

?>