<?php


?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Conexion</title>

  <link rel="stylesheet" href="public\util\bootstrap-5.3.0-alpha1-dist\css\bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            <img src="public/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
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
        <form>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Entrez un adresse courriel valide" />
            <label class="form-label" for="form3Example3">Adresse courriel</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Entrer le mot de passe" />
            <label class="form-label" for="form3Example4">Mot de passe</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
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

</body>
</html>