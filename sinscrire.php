<?php
   if (isset($_GET['msg'])){
    $msg=$_GET['msg'];
     }
     else {
       $msg="";
     }

     $_SESSION['active_page'] = 'home';
     $pagetitre = "s'inscrire";
     require_once("./public/util/header.php");

?>






  <div class="container h-100 ">
    <div class="row d-flex justify-content-center align-items-center h-100 div-inscrire" >
      <div class="col-lg-12 col-xl-11 ">
        <div class="card text-white " >
          <div class="card-body p-md-5 bg-secon div-inside-inscrire">
            <div class="row justify-content-center ">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 ">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 text-dark">S'inscrire</p>

                <!-- Compléter l'action --- le lier au serveur -->
                <form class="mx-1 mx-md-4" action="server/actions/enregistrerMembre.php" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="firstName" placeholder="Entrez votre prénom" name="firstName"  class="form-control" required/>
                      <label class="form-label text-dark" for="form3Example1c">Votre prénom</label>
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="lastName" placeholder="Entrez votre nom" name="lastName"  class="form-control" required/>
                      <label class="form-label text-dark" for="form3Example1c">Votre nom</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="email" placeholder="toto@exemple.com" name="email"class="form-control" required/>
                      <label class="form-label text-dark" for="form3Example3c">Votre courriel</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" id="age" placeholder="Entrez votre âge" min="18" max="120" name="age" class="form-control" required/>
                      <label class="form-label text-dark" for="form3Example4c">Votre âge</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password"  id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le mot de passe doit contenir au moins un chiffre, une lettre majuscule et une lettre minuscule, et avoir au moins 8 caractères ou plus " name="pass" class="form-control" required/>
                      <label class="form-label text-dark" for="form3Example4c">Mot de passe</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="pass"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le mot de passe doit contenir au moins un chiffre, une lettre majuscule et une lettre minuscule, et avoir au moins 8 caractères ou plus " name="pass2" class="form-control" required/>
                      <label class="form-label text-dark" for="form3Example4cd">Confirmer votre mot de passe</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input check-box me-2" type="checkbox" value="" id="conditionCheckBox" required
                   
                    />
                    <label class="form-check-label text-dark" for="form2Example3">
                    J'accepte toutes les déclarations dans les <a href="#!" class="link-dark"> Conditions d'utilisation</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button id="btnInscrire" type="submit" class="btn-design" style="background-color: rgb(138, 138, 138 );">S'inscrire</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src=".\public\images\Logo-line-white.png" class="logo-inscrire" alt="">
              </div>
            </div>
          </div>
        </div>
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