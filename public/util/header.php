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
  
  <link rel="icon" type="image/x-icon" href="./public/images/Logo-partern-white.png">
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" ></script>
  <script src="./public/js/app.js"  ></script>
  
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</head>

<body onLoad="initialiser(<?php echo "'" . $msg . "'" ?>);" class="d-flex flex-column min-vh-100" style='font-family: Arial, Helvetica, sans-serif;'> 

<header class="w-100">
<?php if($active_page == 'admin'){?>
  <nav class="font-design navbar navbar-dark navbar-expand-lg text-center sticky-top bg-header" >
    <div id="navCont" class="container maxWidth">


          <div class="d-flex nav-gauche">
              <img src = "public/images/logo-no-bg.png" width ="90px" height ="90px" href="index.php"/>
              <a class="font-title navbar text-dark" href="index.php">LOML</a>
          </div>	
          
   

    		
      <div class="d-flex nav-droite">
          <input class="form-control me-2" type="search" name="email" id="inputReche" placeholder="Recherche par ID" aria-label="Recherche">
          <button type="button" class="btn btn-dark" name="search" id="btnrecherche">Rechercher</button>
      </div>
            
    </div>
  </nav>

<?php } ?>  

<?php if($active_page == 'membre'){?>

  <nav class="font-design navbar navbar-dark navbar-expand-lg text-center sticky-top bg-header" >
          <div id="navCont" class="container maxWidth">
            <div class="d-flex nav-gauche">
              <!--Le mettre beau -->
              <img src='public/images/menuLogo.png' width='60pt' height='60pt' class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <i class="fas fa-bars"></i>
              </img>
              
              <img src = "public/images/logo-no-bg.png" width ="60px" height ="60px" href="index.php"/>
              <a class="font-title navbar text-dark" href="index.php">LOML</a>
            </div>	
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ms-auto">
                    <a href="./contactUs.php" class="btn btn-dark"> Contactez-nous<i class="ms-1 fa-solid fa-user"></i></a>
                    <a href="./deconnexion.php" class="btn btn-dark"> Se Déconnecter<i class="ms-1 fa-solid fa-user"></i></a>
                </div>
            </div>
        </div>
    </nav>
<?php } 
?>  


<?php if($active_page == 'home'){?>
  <nav class="font-design navbar navbar-dark navbar-expand-lg text-center sticky-top bg-header">
        <div id="navCont" class="container maxWidth">
          
            <div class="d-flex nav-gauche">
              <img src = "public/images/logo-no-bg.png" width ="90px" height ="90px" href="index.php"/>
              <a class="font-title navbar text-dark " href="index.php">LOML</a>
            </div>	

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbanr-av me-auto">                    
                </div>
                  <div class="navbar-nav ms-auto">
                    <a href="./conexion.php" class="nav-item nav-link text-nav text-dark btn-animation"> se connecter<i class="ms-1 fa-solid fa-user"></i></a>
                    <a href="./sinscrire.php" class="nav-item nav-link text-nav text-dark btn-animation"> s'inscrire<i class="ms-1 fa-solid fa-user"></i></a>
                    <a href="./about.php" class="nav-item nav-link text-nav text-dark btn-animation">à propos</a>
                    <a href="./contactUs.php" class="nav-item nav-link text-nav text-dark btn-animation">contactez-nous</a>
                </div>
            </div>
        </div>
    </nav>
<?php } ?>  


</header>

<main class="mb-auto w-100 h-100">