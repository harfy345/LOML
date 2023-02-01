<?php

session_start();

if(!isset($_SESSION['isAdmin']) || empty($_SESSION['isAdmin']) )  header("location:./conexion.php");

// vous mettez ca dans une page que vous voulez pas que l'utilisateur ait acces sans connexion 

if (!isset($_SESSION['username'])) {
    header("location:./conexion.php");
}

$pagetitre = "index";
require_once("./public/util/headerAdminetMembre.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light nav-bg">
		<div class="container-fluid">
		<a class="navbar-brand" href="#"> <img src="../public/images/logo2.jpg"  style= 'width: 50px; height: 50px;'></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
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
						<button class="btn btn-info" onClick="location.href = 'admin.php';">Gérer les membres</button><br>
						
					</div>
					<div class="d-flex nav-droite">
						
						<a class="btn btn-info" href="deconnexion.php">Déconnexion</a>
					</div>
            
		</div>
		</nav>
        </body>
</html>
<?php
require_once("./public/util/footer.php");
?>
<?php

require_once("./public/util/footer.php");

?>