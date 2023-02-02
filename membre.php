<?php

session_start();

// vous mettez ca dans une page que vous voulez pas que l'utilisateur ait acces sans connexion 
if (!isset($_SESSION['username'])) {
    header("location:./conexion.php");
}

$pagetitre = "index";
require_once("./public/util/headerAdminetMembre.php");
?>
    <div style="background-color: rgba(26, 26, 27, 1);">
        <div class="container accordion-body" style="padding-top: 5%; padding-bottom: 5%;" id="contenu" >
            <div class="msg" id="msg">
                <div class="card" style="max-width: 400px; min-height: 700px;">
                    <div class="card-body" style="background-size: cover; background-position: center; background-repeat: no-repeat; background-image: url('https://static1.purepeople.com/articles/5/43/24/55/@/6216245-annily-chatelain-la-fille-d-alizee-et-j-950x0-2.jpg');">
                    <div class="align-items-end" style="background: linear-gradient(rgb(255,255,255, 0), rgb(0,0,0, 1)); padding-left: 10px; position: absolute; right: 0px; bottom: 8%; display: flex; justify-content: flex-start; align-items: flex-end;">
                        <div class="row" style="margin-right: 0px;">
                            <div class="col">
                            <!-- Prenom -->
                            <h3 class="card-title col-3" style="color: white; width: max-content; height: fit-content; margin-right: 115px;">Emma</h3> 
                            </div>
                            <div class="col">
                            <!-- Age -->
                            <h3 class="card-title col-3" style="color: rgba(255, 255, 255, 0.7); width: max-content; height: fit-content; margin-left: -125px;">21</h3>
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
                    <a href="#" class="btn btn-secondary rounded-6" style="border-color: rgb(255, 255, 255, 0.5); background-color: rgba(255, 255, 255, 0); color: rgb(250, 252, 250, 0.5);" >see more</a>
                    <a href="#" class="btn btn-primary rounded-circle" style="height: 40px; width: 40px;  border-color: rgb(11, 144, 22); border-radius: 5em; background-color: rgba(255, 255, 255, 0); color: rgb(11, 144, 22);">O</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

require_once("./public/util/footer.php");

?>