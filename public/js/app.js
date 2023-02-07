$(window).on('load', function () {
    $("#coverScreen").hide();
});

$("#btnrecherche, #btnEdit").click(function () {
    $("#coverScreen").show();
});
$("#contenu").click(function () {
    $("#coverScreen").hide();
})

let initialiser = (message) =>{

    let textToast = document.getElementById("textToast");
    let toastElList = [].slice.call(document.querySelectorAll('.toast'))
    let toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl)
    })
    if(message.length > 0){
        textToast.innerHTML = message;
        toastList[0].show();
    }
}


let montrerFormEnreg = () => {
    
    let form = `
    <!-- Modal pour enregistrer patient -->
        <div class="modal fade" id="enregModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enregistrer Un membre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="formEnreg" action="server/actions/enregistrerMembre.php" method="POST">
                        <div class="col-md-12">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control is-valid" id="firstName" name="firstName" required>
                        </div>
                        <div class="col-md-12">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control is-valid" id="lastName" name="lastName" required>
                        </div>
                        <div class="col-md-12">
                            <label for="adresse" class="form-label">courriel</label>
                            <input type="text" class="form-control is-valid"  id="email" name="email" required>
                        </div>
                        <div class="col-md-12">
                            <label for="adresse" class="form-label">Mot de Passe</label>
                            <input type="text" class="form-control is-valid" id="pass" name="pass"required>
                        </div>
                        <div class="col-md-12">
                            <label for="adresse" class="form-label">retaper Mot de Passe</label>
                            <input type="text" class="form-control is-valid" id="pass" name="pass2"required>
                        </div>
                        </br>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" >Enresgister</button>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin du modal pour enregistrer film -->
    `;
    document.getElementById('contenu').innerHTML = form;
    $('#enregModal').modal('show');
}


function editRow(id) {
    $.ajax({
        url: 'server/apis/membre.php',
        type: 'post',
        data: {
            id: id,
            action: 'getRowData',
        },
        success: function(response) {
            // parse the JSON response
            var data = JSON.parse(response);
            // fill the form inputs with the data
            $('#editidUser').val(data.idUser);
            $('#editFirstName').val(data.firstName);
            $('#editLastName').val(data.lastName);
            $('#editAdmin').val(data.admin);
            $('#editEmail').val(data.email);
            $('#editPass').val(data.pass);
        }
    });

    let form = `
    <!-- Modal pour enregistrer patient -->
        <div class="modal fade" id="enregModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier Un membre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="formEnreg" action="server/actions/updateMembre.php" method="POST">
                        <div class="col-md-12">
                            <input type="hidden" class="form-control is-valid" id="editidUser" name="idUser"  required>
                        </div>
                        <div class="col-md-12">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control is-valid" id="editFirstName" name="firstName" required>
                        </div>
                        <div class="col-md-12">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control is-valid" id="editLastName" name="lastName" required>
                        </div>
                        <div class="col-md-12">
                            <label for="adresse" class="form-label">courriel</label>
                            <input type="text" class="form-control is-valid" id="editEmail" name="email" required>
                        </div>
                        <div class="col-md-12">
                            <label for="adresse" class="form-label">Mot de Passe</label>
                            <input type="text" class="form-control is-valid" id="editPass" name="pass"required>
                        </div>
                        </br>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" >Enresgister</button>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin du modal pour enregistrer film -->
    `;
    document.getElementById('contenu').innerHTML = form;
    $('#enregModal').modal('show');
   
}


function deleteRow(id) {
    $.ajax({
        url: 'server/apis/membre.php',
        type: 'post',
        data: {
            id: id,
            action: 'delete',
        },
        success: function(response) {
            alert("usager bien supprimer");
        }
    });
}

$(document).ready(function() {
    $("button[name='search']").click(function(e) {
      e.preventDefault();
      var id = $("input[name='email']").val();
      $.ajax({
        url:  "server/apis/membre.php",
        type: "post",
        data: {
            id: id,
            search: true
        },
        success: function(response) {
            // parse the JSON response
            var data = JSON.parse(response);
            // fill the form inputs with the data
            $('#FirstName').val(data.first_name);
            $('#LastName').val(data.last_name);
            $('#Email').val(data.email);
        }
      });

      
    let form = `
    <!-- Modal pour enregistrer patient -->
        <div class="modal fade" id="enregModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">recherche membre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="formEnreg" action="server/actions/deleteMembre.php" method="POST">
                        <div class="col-md-12">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" disabled="disabled" class="form-control is-valid" id="FirstName" name="firstName" required>
                        </div>
                        <div class="col-md-12">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" disabled="disabled" class="form-control is-valid" id="LastName" name="lastName" required>
                        </div>
                        <div class="col-md-12">
                            <label for="adresse" class="form-label">courriel</label>
                            <input type="text" disabled="disabled" class="form-control is-valid" id="Email" name="email" required>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin du modal pour enregistrer film -->
    `;
    document.getElementById('contenu').innerHTML = form;
    $('#enregModal').modal('show');
    });
  });
  


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


function popupProfileMembre() {
    let card = `
   <!-- Modal pour profil -->
   <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalProfil" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen" >
                <div class="modal-content" style="margin: 0 auto; padding: 40px 100px 100px 100px; align-items: center; text-align: center; background-image: linear-gradient(to bottom, rgb(227, 111, 111) , rgb(247, 142, 142));  color: rgb(0, 0, 0); width:35%; height:75%">
                    <img class="rounded-circle" style="width: 15%; border: 10px solid white;"  src="public/images/Logo.PNG" alt="">  
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalProfilLabel">NOUVEAU PROFILE</h5>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3"  id="formProfil" action="server/actions/enregistrerProfil.php" method="POST" style="align-content: center;">
                            <div class="col-md-12 mySlides">
                                <label for="age" style="text-align: center;" class="form-label">Quelle est votre age ?</label>
                                <input type="age"class="form-control" id="age" name="age">
                            </div>
                            <div class="col-md-12 mySlides">
                                <label for="bio" class="form-label">Parlez-nous de vous</label> <br>
                                <textarea id="bio" name="bio" rows="5" cols="50"></textarea>
                            </div>
                            <div class="col-md-12 mySlides">
                                <label for="height" class="form-label">Quelle est votre taille ? (cm)</label> 
                                <input type="height" class="form-control" id="height" name="height" required> 
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin modal pour profil -->
    `;
    document.getElementById('contenuModalProfil').innerHTML = card;
    $('#modalProfil').modal('show');
}
