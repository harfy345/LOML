<?php

session_start();

// vous mettez ca dans une page que vous voulez pas que l'utilisateur ait acces sans connexion 
if (!isset($_SESSION['username'])) {
    header("location:./conexion.php");
}

$pagetitre = "index";
require_once("./public/util/headerAdminetMembre.php");
?>
         <!-- Modal pour profil -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalProfil" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen" >
                <div class="modal-content" style="margin: 0 auto; padding: 40px 100px 100px 100px; align-items: center; text-align: center; background-image: linear-gradient(to bottom, rgb(227, 111, 111) , rgb(247, 142, 142));  color: rgb(0, 0, 0);">
                    <img class="rounded-circle" style="width: 15%; border: 10px solid white;"  src="public/images/Logo.PNG" alt="">  
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalProfilLabel">NOUVEAU PROFILE</h5>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3"  id="formProfil" action="server/actions/enregistrerProfil.php" method="POST" style="align-content: center;">
                            <div class="col-md-12 mySlides">
                                <label for="age" style="text-align: center;" class="form-label">Quelle est votre age ?</label>
                                <input type="age" style="align-self: center; width: 300px;" class="form-control" id="age" name="age">
                            </div>
                            <div class="col-md-12 mySlides">
                                <label for="bio" class="form-label">Parlez-nous de vous</label> <br>
                                <textarea id="bio" name="bio" rows="5" cols="50"></textarea>
                            </div>
                            <div class="col-md-12 mySlides">
                                <label for="height" class="form-label">Quelle est votre taille ? (cm)</label> 
                                <input type="height" style="align-self: center; width: 300px;" class="form-control" id="height" name="height" required> 
                            </div>
                            <div class="mySlides">
                            <span class="msgFormEnreg">Ton sexe ?</span><br><br>
                            <div class="form-check mb-3">
                                <input type="radio" class="form-check-input" id="feminin" value="1" name="gender">
                                <label class="form-check-label" for="feminin">Féminin</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="radio" class="form-check-input" id="masculin" value="2" name="gender">
                                <label class="form-check-label" for="masculin">Masculin</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="radio" class="form-check-input" id="nonBinaire" value="3" name="gender">
                                <label class="form-check-label" for="nonBinaire">Non Binaire</label>
                            </div>
                            </div>
                            <div class="mySlides">
                            <span class="msgFormEnreg">Quelle type de relation recherche-tu ?</span> <br><br>
                            <div class="form-check mb-3">
                                <input type="radio" class="form-check-input" id="serieux" value="serieux" name="relation">
                                <label class="form-check-label" for="serieux">Relation sérieuse</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="radio" class="form-check-input" id="rien" value="rien" name="relation">
                                <label class="form-check-label" for="rien">Rien de sérieux</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="radio" class="form-check-input" id="sex" value="friend" name="relation">
                                <label class="form-check-label" for="sex">Sex friend</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="radio" class="form-check-input" id="coup" value="coup" name="relation">
                                <label class="form-check-label" for="coup">Coup d'un soir</label>
                            </div>
                        </div>
                        <div class="col-md-12 mySlides">
                            <label for="picture" class="form-label">Photo de profil</label>
                            <input type="file" accept="image/*" class="form-control" id="picture" name="picture" id="in" value="">
                            <div class="mySlidesform-check col-12">
                                <button class="btn btn-primary" style="margin-top: 15px; border: 5px solid white; background-color: rgb(0, 0, 0,0);" type="submit">Enregister</button>                              
                            </div>
                        </div>
                        
                        </form>
                        <div class="row" style="margin-top: 10px;">
                        <div class="col" style="margin: 0px 0px 0px; left: 0px;" ><button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button></div>
                        <div class="col" style="margin: 0px 0px 0px; right: 0px;"><button class="w3-button w3-display-right" onclick="plusDivs(+1)">&#10095;</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin modal pour profil -->

        <div id="profil" class="container accordion-body" style="padding-top: 5%; padding-bottom: 5%;" id="contenu" >
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
                    <a onClick="afficherProfil();" class="btn btn-secondary rounded-6" style="border-color: rgb(255, 255, 255, 0.5); background-color: rgba(255, 255, 255, 0); color: rgb(250, 252, 250, 0.5);" >see more</a>
                    <a href="#" class="btn btn-primary rounded-circle" style="height: 40px; width: 40px;  border-color: rgb(11, 144, 22); border-radius: 5em; background-color: rgba(255, 255, 255, 0); color: rgb(11, 144, 22);">O</a>
                    </div>
                </div>
            </div>
        </div>

    <script type="text/javascript">

        //Navigation pour modal profil
        var slideIndex = 1;
        showDivs(slideIndex);
        
        function plusDivs(n) {
            showDivs(slideIndex += n);
        }
        
        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {slideIndex = 1}
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
            }
            x[slideIndex-1].style.display = "block";  
        }
        //fin Navigation pour modal profil

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
$test = $_SESSION['getProfil'];
if(!isset($test)){
    echo '
    <script>
    open();
    function open() {
        $("#modalProfil").modal();
    }
    </script>
    ';
}
?>