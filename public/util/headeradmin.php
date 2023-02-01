
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
            <img src = "public/images/Logo.PNG" width ="60px" height ="60px" href="index.php">
            <a class="dr-title navbar-brand text-nav display-3" href="index.php">LOML</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <i class="fas fa-bars"></i>
            </button>



            <ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:rendreVisible('divEnreg');">Enregistrer</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:lister('','');">Lister</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:rendreVisible('divFiche');">Modifier</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:rendreVisible('divEnlever');">Enlever</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:rendreVisible('divEnlever');">Enlever tous </a>
				</li>
			</ul>
    
            <div class="d-flex  nav-droite">
                <select class="form-select" onChange="lister('categorie',this.options[this.selectedIndex].value)">
                    <option value="dr">Choisir ...</option>
                    <option value="dr">Prénom</option>
                    <option value="co">Nom</option>
                    <option value="su">Taille</option>
                    <option value="ac">Sexe</option>
                    <option value="ac">Age</option>
                    <option value="ac">Type de relation</option>
                </select>
            </div>			
				
            <div class="d-flex nav-droite">
                <input class="form-control me-2" type="search" id="rctitre" placeholder="Recherche" aria-label="Recherche">
                <button class="btn btn-info" onClick="lister('titre',document.getElementById('rctitre').value)">Recherche</button>
            </div>
		
			</div>
                <div class="d-flex nav-droite">
                    <a href="./deconnexion.php" class="btn btn-info"> Se Déconnecter<i class="ms-1 fa-solid fa-user"></i></a>
                </div>               
		    </div>

            
        </div>
    </nav>
    <main class="mb-auto">