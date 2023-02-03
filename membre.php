<?php

session_start();

// vous mettez ca dans une page que vous voulez pas que l'utilisateur ait acces sans connexion 
if (!isset($_SESSION['username'])) {
    header("location:./conexion.php");
}

require_once("./server/apis/membre.php");

$currentMembre = getCurrentMembre($_SESSION['id']);

$pagetitre = "index";
require_once("./public/util/headerAdminetMembre.php");
?>


<link rel="stylesheet" href="public/css/membre.css">

<div id="profil" class="container accordion-body d-flex justify-content-center" style=" padding-bottom: 5%;" id="contenu" >
    <div class="msg" id="msg">
        <div class="card" style="max-width: 400px; min-height: 700px;">
            <div class="card-body" style="background-size: cover; background-position: center; background-repeat: no-repeat; background-image: url('https://static1.purepeople.com/articles/5/43/24/55/@/6216245-annily-chatelain-la-fille-d-alizee-et-j-950x0-2.jpg');">
                <div class="align-items-end">
                    <div class="row" style="margin-right: 0px;">
                        <div class="col">
                        <!-- Prenom -->
                        <h3 class="card-title col-3" style="color: white; width: max-content; height: fit-content; margin-right: 115px; margin-top: 500px">Emma</h3> 
                        </div>
                        <div class="col">
                        <!-- Age -->
                        <h3 class="card-title col-3" style="color: rgba(255, 255, 255, 0.7); width: max-content; height: fit-content; margin-left: -125px; margin-top: 500px">21</h3>
                        </div>
                        <div class="col">
                        <!-- Icon recherche quelle type de relation -->
                        <img style="width: 40%; margin-left: -165px;" src="https://cdn-icons-png.flaticon.com/512/1029/1029183.png" alt="">
                        </div>
                        <!-- position -->
                        <h6 class="card-title align-items-end" style="color: rgb(255, 255, 255); ">1 km</h6>
                        <!-- extrait de la bio -->
                        <p class="card-title align-items-end" style="color: rgb(255, 255, 255, 0.7);">Are you a parking ticket? ‘Cause you’ve got ‘fine’ written all over you...</p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center" style="background-color: rgb(0, 0, 0); height: 25%;">
            <!-- Bouton -->
            <a href="#" class="btn btn-primary rounded-circle" style="height: 40px; width: 40px; border-color: rgb(157, 17, 17); border-radius: 5em; background-color: rgba(255, 255, 255, 0); color: rgb(157, 17, 17);">X</a>
            <a onClick="afficherProfil();" class="btn btn-secondary rounded-6" style="border-color: rgb(255, 255, 255, 0.5); background-color: rgba(255, 255, 255, 0); color: rgb(250, 252, 250, 0.5);" >see more</a>
            <a href="#" class="btn btn-primary rounded-circle" style="height: 40px; width: 40px;  border-color: rgb(11, 144, 22); border-radius: 5em; background-color: rgba(255, 255, 255, 0); color: rgb(11, 144, 22);">O</a>
            </div>
        </div>
    </div>
</div>








<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
       


                <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Compte
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body"><?php echo $currentMembre->firstName?></div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Message
                </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Allo</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Matches
                </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Allo</div>
                </div>
            </div>
            </div>



      </div>
    </div>
  </nav>
  <!-- Sidebar -->

</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;">
  <div class="container pt-4"></div>
</main>
<!--Main layout-->














    <script type="text/javascript">
    function afficherProfil() {
        let card = `
            <div class="msg" id="msg" style="width: fit-content; height: auto; padding-top: 0%;">
            <div class="card" style="max-width: 400px; min-height: 600px;">
                <div class="card-body" style=" background-size: cover; background-position: center; background-repeat: no-repeat; background-image: url('https://static1.purepeople.com/articles/5/43/24/55/@/6216245-annily-chatelain-la-fille-d-alizee-et-j-950x0-2.jpg');">
                    <div class="align-items-end" style="background: linear-gradient(rgb(255,255,255, 0), rgb(0,0,0, 1)); padding-left: 10px; position: absolute; left: 0px; right: 0px; bottom: 0%;">
                    <div class="row" style="margin-right: 0px;">
                        <div class="col">
                        <h3 class="card-title col-3" style="color: white; width: max-content; height: fit-content; margin-right: 115px;">Emma</h3> 
                        </div>
                        <div class="col">
                        <h3 class="card-title col-3" style="color: rgba(255, 255, 255, 0.7); width: max-content; height: fit-content; margin-left: -125px;">21</h3>
                        </div>
                        <h6 class="card-title align-items-end" style="color: rgb(255, 255, 255);">1 km</h6>
                    </div>
                    </div>
                </div>
            </div>
            <div class="card" style="color: white; top: 5%; position: sticky; background-color: black; margin-top: -9px; max-width: 400px;  height: auto;">
            <div class="card-body">
                <h6>Bio</h6>
                <p class="card-title align-items-end" style="color: rgb(255, 255, 255, 0.7);">Are you a parking ticket? ‘Cause you’ve got ‘fine’ written all over you <br><br> I am funny, kind, gorgeous, grateful, and humble. Okay, maybe not the last one! These are just a few of the adjectives that represent who I aim to be.</p>
            </div>
            <div class="card-body">
                <h6>Genre <img style="width: 8%;" src="https://cdn-icons-png.flaticon.com/512/3673/3673582.png" alt=""></h6>
                <p style="color: rgb(255, 255, 255, 0.7);">Je suis une femme</p>
            </div>
            <div class="card-body">
                <h6>Relations <img style="width: 8%;" src="https://cdn-icons-png.flaticon.com/512/1029/1029183.png" alt=""> </h6>
                <p style="color: rgb(255, 255, 255, 0.7);">Je recherche l'amour</p>
            </div>
            <div class="card-body">
                <h6>Taille <img style="width: 8%;" src="https://cdn-icons-png.flaticon.com/512/5478/5478995.png" alt=""></h6>
                <p style="color: rgb(255, 255, 255, 0.7);">Je mesure 5'3</p>
            </div>
            <div class="card-footer  text-center" style="position: relative; background-color: rgb(0, 0, 0); height: 25%;">
                <a href="#" class="btn btn-primary rounded-circle" style="height: 40px; width: 40px; border-color: rgb(157, 17, 17); border-radius: 5em; background-color: rgba(255, 255, 255, 0); color: rgb(157, 17, 17);">X</a>
                <a onClick="normalProfil()" class="btn btn-secondary rounded-6" style="border-color: rgb(255, 255, 255, 0.5); background-color: rgba(255, 255, 255, 0); color: rgb(250, 252, 250, 0.5);" >see less</a>
                <a href="#" class="btn btn-primary rounded-circle" style="height: 40px; width: 40px; border-color: rgb(11, 144, 22); border-radius: 5em; background-color: rgba(255, 255, 255, 0); color: rgb(11, 144, 22);">O</a>
            </div>
        </div>
        `;
        document.getElementById('profil').innerHTML = card;
    }
    function normalProfil() {
        let card = `
        <div class="msg" id="msg">
                <div class="card" style="max-width: 400px; min-height: 700px;">
                    <div class="card-body" style="background-size: cover; background-position: center; background-repeat: no-repeat; background-image: url('https://static1.purepeople.com/articles/5/43/24/55/@/6216245-annily-chatelain-la-fille-d-alizee-et-j-950x0-2.jpg');">
                        <div class="align-items-end" >
                            <div class="row" style="margin-right: 0px;">
                                <div class="col">
                                <!-- Prenom -->
                                <h3 class="card-title col-3" style="color: white; width: max-content; height: fit-content; margin-right: 115px;  margin-top: 500px">Emma</h3> 
                                </div>
                                <div class="col">
                                <!-- Age -->
                                <h3 class="card-title col-3" style="color: rgba(255, 255, 255, 0.7); width: max-content; height: fit-content; margin-left: -125px; margin-top: 500px">21</h3>
                                </div>
                                <div class="col">
                                <!-- Icon recherche quelle type de relation -->
                                <img style="width: 40%; margin-left: -165px;" src="https://cdn-icons-png.flaticon.com/512/1029/1029183.png" alt="">
                                </div>
                                <!-- position -->
                                <h6 class="card-title align-items-end" style="color: rgb(255, 255, 255);">1 km</h6>
                                <!-- extrait de la bio -->
                                <p class="card-title align-items-end" style="color: rgb(255, 255, 255, 0.7);">Are you a parking ticket? ‘Cause you’ve got ‘fine’ written all over you...</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center" style="background-color: rgb(0, 0, 0); height: 25%;">
                    <!-- Bouton -->
                    <a href="#" class="btn btn-primary rounded-circle" style="height: 40px; width: 40px; border-color: rgb(157, 17, 17); border-radius: 5em; background-color: rgba(255, 255, 255, 0); color: rgb(157, 17, 17);">X</a>
                    <a onClick="afficherProfil();" class="btn btn-secondary rounded-6" style="border-color: rgb(255, 255, 255, 0.5); background-color: rgba(255, 255, 255, 0); color: rgb(250, 252, 250, 0.5);" >see more</a>
                    <a href="#" class="btn btn-primary rounded-circle" style="height: 40px; width: 40px;  border-color: rgb(11, 144, 22); border-radius: 5em; background-color: rgba(255, 255, 255, 0); color: rgb(11, 144, 22);">O</a>
                    </div>
                </div>
            </div>
        `;
        document.getElementById('profil').innerHTML = card;
    }
</script>
<?php

require_once("./public/util/footer.php");

?>