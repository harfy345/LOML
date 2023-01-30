
<?php

$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  


if (session_id() ) {
    header("location:./index.php");
    
} else if ($curPageName != 'conexion.php') header("location:./conexion.php");



?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo $pagetitre ?></title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body onLoad="initialiser(<?php echo "'" . $msg . "'" ?>);" class="d-flex flex-column min-vh-100" style='font-family: Arial, Helvetica, sans-serif;'> 
<nav class="navbar navbar-dark navbar-expand-lg text-center sticky-top" style="background-color: blue;">
        <div id="navCont" class="container maxWidth">
            <a class="dr-title navbar-brand text-nav display-3" href="index.php">LOML</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav me-auto">
                   
                <a href="#" class="nav-item nav-link text-nav">link1</a>
                <a href="#" class="nav-item nav-link text-nav">link2</a>

                    
                </div>

                <div class="navbar-nav ms-auto">
                    <a href="#" class="nav-item nav-link text-nav"> se connecter<i class="ms-1 fa-solid fa-user"></i></a>
                </div>

                
            </div>


        </div>
    </nav>
    <main class="mb-auto">