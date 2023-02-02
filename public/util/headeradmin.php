<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo $pagetitre ?></title>
  <script src="./public/js/app.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  

</head>

<nav class="navbar navbar-dark navbar-expand-lg text-center sticky-top" style="background-color: blue;">
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
					<button  type="button" class="btn btn-primary" >Accueil</button >
				</li>
				<li class="nav-item">
					<button type="button" class="btn btn-primary" onclick="montrerFormEnreg();">Enregistrer</button>
				</li>
				<li class="nav-item">
					<button type="button" class="btn btn-primary" onclick="listerMembre();">Lister</button>
				</li>
				<li class="nav-item">
					<button type="button" class="btn btn-primary" href="javascript:rendreVisible('divFiche');">Modifier</button>
				</li>
				<li class="nav-item">
					<button type="button" class="btn btn-primary" href="javascript:rendreVisible('divEnlever');">Enlever</button>
				</li>
				<li class="nav-item">
					<button type="button" class="btn btn-primary" href="javascript:rendreVisible('divEnlever');">Enlever tous </button>
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
           

            
        </div>
    </nav>
    <main class="mb-auto">