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

  <div class="container-fluid h-custom form-connexion">
    <div class="row d-flex justify-content-center align-items-center h-100 connexion-position">
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 text-info-connexion form-design menu-index-animation connexion-position-inside">
      <!-- Compléter l'action --- le lier au serveur -->
        <div class="form-outline text-white mb-4">
          <h1>LOVE OF MY LIFE</h1>
        </div>
        <div class="form-outline mb-4">
          <img style="width:15%;"  src=".\public\images\Logo-partern-white.png" alt="">
          <img style="width:15%;"  src=".\public\images\Logo-partern-white.png" alt="">
          <img style="width:15%;"  src=".\public\images\Logo-partern-white.png" alt="">
          <img style="width:15%;"  src=".\public\images\Logo-partern-white.png" alt="">
          <img style="width:15%;"  src=".\public\images\Logo-partern-white.png" alt="">
          <img style="width:15%;"  src=".\public\images\Logo-partern-white.png" alt="">
        </div>
        <form action="server/actions/sendRecoveryMail.php" method="POST">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="courrielc" name="courrielc" class="form-control form-control-lg" placeholder="Entrez un adresse courriel valide" required />
            <label class="font-design form-label text-info-connexion text-dark" for="form3Example3">Adresse courriel</label>
          </div>
          

          <div class="text-center text-lg-start mt-4 pt-2">
            <button class='btn-design' type="submit" class="btn btn-dark btn-lg rd">Réinitialiser le mot de passe</button>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>

    



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

<link rel="stylesheet" href="./public/css/conexion.css">