<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/css/style.css"></link>

  <title><?php echo $pagetitre ?></title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  

</head>

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


            <ul class="navbar-nav">
				<li class="nav-item">
					<button type="button" class="btn btn-primary" onclick="montrerFormEnreg();">Enregistrer</button>
				</li>
				<li class="nav-item">
					<button type="button" class="btn btn-primary" onclick="deleteAll();">Enlever tous </button>
				</li>
			</ul>
    
            		
			<div class="d-flex nav-droite">
                <input class="form-control me-2" type="search" name="email" id="inputReche" placeholder="Recherche" aria-label="Recherche">
                <button type="button" class="btn btn-primary" name="search" id="btnrecherche">recherche</button>
            </div>

           
            <div class="d-flex nav-droite">
                <a href="./membre.php" class="btn btn-info">Page Membre<i class="ms-1 fa-solid fa-user"></i></a>
            </div>               
    
            <div class="d-flex nav-droite">
                <a href="./deconnexion.php" class="btn btn-info"> Se Déconnecter<i class="ms-1 fa-solid fa-user"></i></a>
            </div>               

       
           

            
        </div>
    </nav>
    <main class="mb-auto">