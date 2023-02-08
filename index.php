<?php
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


<div class="d-flex justify-content-center my-auto w-100 h-100"> 
    
    <section class="jumbotron text-center " id="aaaaac">
        <div class="container">
          <h1 class="jumbotron-heading">Bienvenue sur notre de site de rencontre</h1>
          <h2 class="lead text-muted">Love of my life</h2>
          <p>
            <button class="btn btn-primary col-3" onClick="location.href = 'sinscrire.php';">S'inscrire</button>
            <button class="btn btn-primary col-3" onClick="location.href = 'conexion.php';">Se connecter</button>
          </p>
        </div>
      </section>
</div>
   
  
</body>
</html>




<?php

require_once("./public/util/footer.php");

?>