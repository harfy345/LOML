<?php
$pagetitre = "index";
require_once("./public/util/header.php");

?>
<link rel="stylesheet" href="./public/css/style.css">

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
   



<?php

require_once("./public/util/footer.php");

?>