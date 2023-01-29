<?php
   if (isset($_GET['msg'])){
    $msg=$_GET['msg'];
     }
     else {
       $msg="";
     }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Conexion</title>

  <script src="public\util\js\jquery-3.6.0.min.js"></script>
  <script src="public\js\app.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>


<body onLoad="initialiser(<?php echo "'".$msg."'" ?>);">
<body>

<nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand"href="./index.php">
          <img src="public/images/logo.jpg" width="60" height="60" class="d-inline-block align-top" alt="">
            LOML
        </a>
</nav>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

        <!-- Compléter l'action --- le lier au serveur -->
        <form action="serveur/actions/connexion.php" method="POST">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="courrielc" name="courrielc"  class="form-control form-control-lg"
              placeholder="Entrez un adresse courriel valide" required/>
            <label class="form-label" for="form3Example3">Adresse courriel</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="passc" name="passc" class="form-control form-control-lg"
              placeholder="Entrer le mot de passe" required/>
            <label class="form-label" for="form3Example4">Mot de passe</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" required/>
              <label class="form-check-label" for="form2Example3">
                Se souvenir de moi
              </label>
            </div>
            <a href="#!" class="text-body">Mot de passe Oublier?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="button" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Conexion</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Pas de Compte? 
                <a href="./sinscrire.php"class="link-danger">S'inscrire</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>


<!-- Afficher le toast de la connection-->
<div class="toast-container posToast">
		<div id="toast" class="toast  align-items-center text-white bg-danger border-0" data-bs-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header">
			<img src="public/images/message.png" width=24 height=24 class="rounded me-2" alt="message">
			<strong class="me-auto">Messages</strong>
			<small class="text-muted"></small>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
			<div id="textToast" class="toast-body">
			</div>
		</div>
	</div>
</div>


</body>
</html>