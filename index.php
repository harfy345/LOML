<?php
$pagetitre = "index";
require_once("./public/util/header.php");

?>
<link rel="stylesheet" href="./public/css/style.css">

<div class="btn btn-primary col-6"  id="aaaaac">   

    <div>
        <h1 style = "color:blue;">Bienvenue sur notre de site de rencontre</h1>
    </div>

    <div class="row">
        <h2> Love of my life </h2>
        <div class="">   
            <button class="btn btn-primary col-3" onClick="location.href = 'sinscrire.php';">S'inscrire</button>
            <button class="btn btn-primary col-3" onClick="location.href = 'conexion.php';">Se connecter</button>
        </div>
    </div>

 
</div>


<?php

require_once("./public/util/footer.php");

?>