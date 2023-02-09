<?php


$active_page = $_SESSION['active_page'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pagetitre ?></title>
  <link rel="stylesheet" href="./public/css/style.css"></link>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  

</head>

<body onLoad="initialiser(<?php echo "'" . $msg . "'" ?>);" class="d-flex flex-column min-vh-100" style='font-family: Arial, Helvetica, sans-serif;'> 

<?php if($active_page == 'admin'){?>
  <nav class="navbar navbar-dark navbar-expand-lg text-center sticky-top bg-header" >
    <div id="navCont" class="container maxWidth">

      <div class="d-flex nav-gauche">
          <div class="d-flex nav-gauche">
              <img src = "public/images/Logo.PNG" width ="60px" height ="60px" href="index.php">
          </div>	
          
          <div class="d-flex nav-gauche">
              <a class="dr-title navbar-brand text-nav display-3" href="index.php">LOML</a>
          </div>	  
      </div>	



    		
      <div class="d-flex nav-droite">
          <input class="form-control me-2" type="search" name="email" id="inputReche" placeholder="Recherche" aria-label="Recherche">
          <button type="button" class="btn btn-primary" name="search" id="btnrecherche">recherche</button>
      </div>
            
    </div>
  </nav>

<?php } ?>  

<?php if($active_page == 'membre'){?>

  <nav class="navbar navbar-dark navbar-expand-lg text-center sticky-top bg-header" >
            <div id="navCont" class="container maxWidth">
            <img src = "public/images/Logo.PNG" width ="60px" height ="60px" href="index.php">
            <a class="dr-title navbar-brand text-nav display-3" href="index.php">LOML</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ms-auto">
                    <a href="./deconnexion.php" class="nav-item nav-link text-nav"> Se Déconnecter<i class="ms-1 fa-solid fa-user"></i></a>
                </div>
            </div>
        </div>
    </nav>
<?php } ?>  


<?php if($active_page == 'home'){?>
  <nav class="navbar navbar-dark navbar-expand-lg text-center sticky-top bg-header">
        <div id="navCont" class="container maxWidth">
            <img src = "public/images/Logo.PNG" width ="60px" height ="60px" href="index.php">
            <a class="dr-title navbar-brand text-nav display-3" href="index.php">LOML</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav me-auto">                    
                </div>
                  <div class="navbar-nav ms-auto">
                    <a href="./conexion.php" class="nav-item nav-link text-nav"> se connecter<i class="ms-1 fa-solid fa-user"></i></a>
                    <a href="./sinscrire.php" class="nav-item nav-link text-nav"> s'inscrire<i class="ms-1 fa-solid fa-user"></i></a>
                    <a href="./about.php" class="nav-item nav-link text-nav">à propos</a>
                    <a href="./contactUs.php" class="nav-item nav-link text-nav">contactez-nous</a>
                </div>
            </div>
        </div>
    </nav>
<?php } ?>  



<main class="mb-auto w-100 h-100">