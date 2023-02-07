<?php
if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
 
} else {
  $msg = "";
}
$_SESSION['active_page'] = 'home';
$pagetitre = "conexion";
require_once("./public/util/header.php");

?>
<section class="vh-100" style="background-repeat: repeat; background-image: url('\public\images\Logo-partern.png');">
  <div class="container-fluid h-custom form-connexion">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 text-light" style="top: 100px; padding: 100px 50px 150px 50px; background-color: #e3b6c7;  left: 100px">
        <!-- Compléter l'action --- le lier au serveur -->
        <div class="form-outline mb-4">
            <img style="width:15%;"  src=".\public\images\Logo-partern-white.png" alt="">
            <img style="width:15%;"  src=".\public\images\Logo-partern-white.png" alt="">
            <img style="width:15%;"  src=".\public\images\Logo-partern-white.png" alt="">
            <img style="width:15%;"  src=".\public\images\Logo-partern-white.png" alt="">
            <img style="width:15%;"  src=".\public\images\Logo-partern-white.png" alt="">
            <img style="width:15%;"  src=".\public\images\Logo-partern-white.png" alt="">
          </div>
        <form action="server/actions/connexion.php" method="POST">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="courrielc" name="courrielc" class="form-control form-control-lg" placeholder="Entrez un adresse courriel valide" required />
            <label class="form-label" for="form3Example3">Adresse courriel</label>
          </div>
          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="passc" name="passc" class="form-control form-control-lg" placeholder="Entrer le mot de passe" required />
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
            <button type="submit" class="btn btn-primary btn-lg rd" style="padding-left: 2.5rem; padding-right: 2.5rem; width: 100%; height:75px; left: 50px; right: 50px; background-color: black;">Conexion</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Pas de Compte?
              <a href="./sinscrire.php" class="link-danger">S'inscrire</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Afficher le toast de la connection-->
<div class="toast-container posToast" style="margin:0 0 0 20px !important; top:20px;">
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

<?php

require_once("./public/util/footer.php");

?>