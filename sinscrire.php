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
  
  <title>Inscription</title>

  <script src="public\util\js\jquery-3.6.0.min.js"></script>
  <script src="public\js\app.js"></script>
  <link rel="stylesheet" href="public\util\bootstrap-5.3.0-alpha1-dist\css\bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body onLoad="initialiser(<?php echo "'".$msg."'" ?>);">
<body>

<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="./index.php">
    <img src="public/images/logo.jpg" width="60" height="60" class="d-inline-block align-top" alt="">
      LOML
  </a>
</nav>

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">S'inscrire</p>

                <!-- Compléter l'action --- le lier au serveur -->
                <form class="mx-1 mx-md-4" action=".php" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="nom" name="nom"  class="form-control" required/>
                      <label class="form-label" for="form3Example1c">Votre Nom</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="courriel" name="courriel"class="form-control" required/>
                      <label class="form-label" for="form3Example3c">Votre courriel</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="pass" name="pass" class="form-control" required/>
                      <label class="form-label" for="form3Example4c">Mot de Passe</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" required/>
                      <label class="form-label" for="form3Example4cd">Retaper Votre Mot de Passe</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required/>
                    <label class="form-check-label" for="form2Example3">
                    J'accepte toutes les déclarations dans les <a href="#!"> conditions d'utilisation</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="button" class="btn btn-primary btn-lg">S'inscrire</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
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