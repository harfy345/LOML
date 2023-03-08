$(window).on("load", function () {
    $("#coverScreen").hide();
});

$("#btnrecherche, #btnEdit").click(function () {
    $("#coverScreen").show();
});
$("#contenu").click(function () {
    $("#coverScreen").hide();
});

let initialiser = (message) => {
    let textToast = document.getElementById("textToast");
    let toastElList = [].slice.call(document.querySelectorAll(".toast"));
    let toastList = toastElList.map(function (toastEl) {
        return new bootstrap.Toast(toastEl);
    });
    if (message.length > 0) {
        textToast.innerHTML = message;
        toastList[0].show();
    }
};

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
                              <input type="password" class="form-control is-valid" id="pass" name="pass"required>
                          </div>
                          <div class="col-md-12">
                              <label for="adresse" class="form-label">confirmer Mot de Passe</label>
                              <input type="password" class="form-control is-valid" id="pass" name="pass2"required>
                          </div>
                          </br>
                          <div class="col-12">
                              <button class="btn btn-primary" type="submit" >Enregistrer</button>
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
    document.getElementById("contenu").innerHTML = form;
    $("#enregModal").modal("show");
};

function editRow(id) {
    $.ajax({
        url: "server/apis/getRowData.php",
        type: "post",
        data: {
            id: id,
            action: "getRowData",
        },
        success: function (response) {
            // parse the JSON response
            var data = JSON.parse(response);
            
            // fill the form inputs with the data
            $("#editidUser").val(data.idUser);
            $("#editFirstName").val(data.firstName);
            $("#editLastName").val(data.lastName);
            $("#editAdmin").val(data.admin);
            $("#editEmail").val(data.email);
            $("#editPass").val(data.pass);
        },
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
                              <button class="btn btn-primary" type="submit" >Enregistrer</button>
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
    document.getElementById("contenu").innerHTML = form;
    $("#enregModal").modal("show");
}

function deleteRow(id) {
    $.ajax({
        url: "server/apis/getRowData.php",
        type: "post",
        data: {
            id: id,
            action: "delete",
        },
        success: function (response) {
            alert("usager bien supprimer");
        },
    });
}
function memberStatus(id) {
    $.ajax({
        url: "server/apis/getRowData.php",
        type: "post",
        data: {
            active: id,
            action: "changeActive",
        },
        success: function (response) {
            alert("L'état du membre a été bien activé.");
            location.reload();
        },
    });
}
function memberStatusDesactive(id) {
    $.ajax({
        url: "server/apis/getRowData.php",
        type: "post",
        data: {
            active: id,
            action: "changeDeactive",
        },
        success: function (response) {
            alert("L'état du membre a été bien désactivé.");
            location.reload();
        },
    });
}

$(document).ready(function () {
    $("button[name='search']").click(function (e) {
        e.preventDefault();
        var id = $("input[name='email']").val();
        $.ajax({
            url: "server/apis/getRowData.php",
            type: "post",
            data: {
                id: id,
                action: "search",
            },
            success: function (response) {
                // parse the JSON response
                var data = JSON.parse(response);
                // fill the form inputs with the data
                $("#FirstName").val(data.first_name);
                $("#LastName").val(data.last_name);
                $("#Email").val(data.email);
            },
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
        document.getElementById("contenu").innerHTML = form;
        $("#enregModal").modal("show");
    });

    $('#conditionCheckBox').change(()=>{
        
        if($("#conditionCheckBox").is(':checked')){ 
            $( "#btnInscrire" ).prop( "disabled", false );
            $( "#btnInscrire" ).css( "background-color","black" );
        } else { 
            $( "#btnInscrire" ).prop( "disabled", true );
            $( "#btnInscrire" ).css( "background-color","rgb(138, 138, 138 )" );
        }
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
    document.getElementById("profil").innerHTML = card;
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
    document.getElementById("profil").innerHTML = card;
}

function popupProfileMembre() {
    let card = `
     <!-- Modal pour profil -->
     <div class="modal fade bd-example-modal-lg" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" tabindex="-1" role="dialog" id="modalProfil" aria-labelledby="modal-fullscreen" aria-hidden="true">
     <div class="modal-dialog " >
         <div class="modal-content" style="margin: 0 auto; padding: 40px 100px 100px 100px; align-items: center; text-align: center; background-image: linear-gradient(to bottom, rgb(252, 195, 195) , rgba(255, 206, 206, 0.572));  color: rgb(0, 0, 0); width:fit-content; height:100%">
             <img class="rounded-circle" style="width: auto; height: 150px; border: 10px solid white;"  src="public/images/Logo.PNG" alt="">  
             <div class="modal-header">
                 <h5 class="modal-title" style="font-size: xx-large;" id="ModalProfilLabel">NOUVEAU PROFILE</h5>
             </div>
             <div class="modal-body">
                 <form class="row g-3" enctype="multipart/form-data" id="formProfil" action="server/actions/enregistrerProfil.php" method="POST" style="align-content: center;">
                     <div class="col-md-12 mySlides">
                         <label for="age"  style="text-align: center; font-size: x-large;" class="form-label">Quelle est votre age ?</label>
                         <input type="number" min="18" max="120" class="form-control" style="max-width: 700px; display: block; text-align: center; margin-right: auto; margin-left: auto;"  id="age" name="age" required>
                     </div>
                     <div class="col-md-12 mySlides">
                         <label for="bio" class="form-label" style="font-size: x-large;">Parlez-nous de vous</label> <br>
                         <textarea id="bio" name="bio"   rows="5" cols="40" required></textarea>
                     </div>
                     <div class="col-md-12 mySlides">
                         <label for="height" class="form-label" style="font-size: x-large;">Quelle est votre taille ? (cm)</label> 
                         <input type="number" min="50" max="260" class="form-control" style="max-width: 700px; display: block; text-align: center; margin-right: auto; margin-left: auto;"  id="height" name="height" required> 
                     </div>
                     <div class="col-md-12 mySlides" style="max-width: 700px; display: block; text-align: center; margin-right: auto; margin-left: auto;">

                         <span class="msgFormEnreg" style="font-size: x-large;">Ton sexe ?</span><br><br>
                         <div class="form-check mb-3">
                             <input type="radio" class="form-check-input" id="feminin" value="1" name="gender" required>
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
                     
                     <div class="col-md-12 mySlides" style="max-width: 700px; display: block; text-align: center; margin-right: auto; margin-left: auto;" >

                         <span class="msgFormEnreg" style="font-size: x-large;">Quelle type de relation recherche-tu ?</span> <br><br>
                         <div class="form-check mb-3">
                             <input type="radio" class="form-check-input" id="serieux" value="serieux" name="relation" required>
                             <label class="form-check-label" for="serieux">Relation sérieuse</label>
                         </div>
                         <div class="form-check mb-3">
                             <input type="radio" class="form-check-input" id="rien" value="rien" name="relation">
                             <label class="form-check-label" for="rien">Rien de sérieux</label>
                         </div>
                         <div class="form-check mb-3">
                             <input type="radio" class="form-check-input" id="sex" value="friend" name="relation">
                             <label class="form-check-label" for="sex" >Sex friend</label>
                         </div>
                         <div class="form-check mb-3">
                             <input type="radio" class="form-check-input" id="coup" value="coup" name="relation">
                             <label class="form-check-label" for="coup">Coup d'un soir</label>
                         </div>

                     </div>
                     <div class="col-md-12 mySlides">
                         <label for="picture" style="font-size: x-large;" class="form-label">Photo de profil</label>
                         <input type="file" style="max-width: 700px; display: block; text-align: center; margin-right: auto; margin-left: auto;" accept="image/*" class="form-control" id="picture" name="picture" id="in" value="" required>
                         <div class="mySlidesform-check col-12">
                             <button class="btn btn-primary text-black" style="margin-top: 15px; border: 5px solid rgb(0, 0, 0); background-color: rgb(0, 0, 0,0);" type="submit">Enregister</button>                              
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
    document.getElementById("contenuModalProfil").innerHTML = card;
    $("#modalProfil").modal("show");
}

function montrerProfil(id) {
    $.ajax({
        url: "server/apis/getRowData.php",
        type: "post",
        data: {
            id: id,
            action: "getRowDataProfil",
        },
        success: function (response) {
            // parse the JSON response
            var data = JSON.parse(response);
            var imageUrl = "server/photosMembres/" + data.picture;
            // fill the form inputs with the data
            $("#editidUser").val(data.idUser);
            $("#editfirstName").val(data.firstName);
            $("#editlastName").val(data.lastName);
            $("#editpicture").attr("src", imageUrl);

            $("#editheight").val(data.height);
            $("#editbio").val(data.bio);

            document.getElementById("radio-" + data.gender).checked = true;
            document.getElementById(data.typeRelation).checked = true;
        },
    });

    let card = `      
  <div class="accordion" id="accordionExample">
  <form id="formEnreg"  enctype="multipart/form-data" action="server/actions/updateprofil.php" method="POST">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingPhoto">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePhoto" aria-expanded="true" aria-controls="collapsePhoto">
      Mes photos
      </button>
    </h2>
    <div id="collapsePhoto" class="accordion-collapse collapse show" aria-labelledby="headingPhoto" data-bs-parent="#accordionExample">
      <div class="accordion-body">
    
          <img style="width:400px; heigth:400px;" id="editpicture"class="rounded mx-auto d-block" alt="...">
          <input type="file" class="form-control is-valid" id="picture" name="picture" />
  
        </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      Mes Informations de base
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
  
                    <label for="height" class="form-label">Quelle est votre taille ? (cm)</label> 
                    <input type="height" class="form-control" id="editheight" name="height" required> 
  
                    <div class="mySlides">
                        <span class="msgFormEnreg">Ton sexe ?</span><br><br>
                        <div class="form-check mb-3">
                            <input type="radio" class="form-check-input" id="radio-1" value="1" name="gender">
                            <label class="form-check-label" for="feminin">Féminin</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="radio" class="form-check-input" id="radio-2"" value="2" name="gender">
                            <label class="form-check-label" for="masculin">Masculin</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="radio" class="form-check-input" id="radio-3" value="3" name="gender">
                            <label class="form-check-label" for="nonBinaire">Non Binaire</label>
                        </div>
                    </div>
  
                    
                      <div class="col-md-12">
                           <input type="hidden" class="form-control is-valid" id="editidUser" name="idUser"  required>
                      </div>
                      <div class="col-md-12">
                          <label for="prenom" class="form-label">Prénom</label>
                          <input type="text" class="form-control" id="editfirstName" name="firstName" required>
                      </div>
                      <div class="col-md-12">
                          <label for="nom" class="form-label">Nom</label>
                          <input type="text" class="form-control " id="editlastName" name="lastName" required>
                      </div>
  
  
        </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      A propos de moi
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
  
  
                <div class="col-md-12 mySlides">
                    <label for="bio" class="form-label">Parlez-nous de vous</label> <br>
                    <textarea id="editbio" name="bio" rows="5" cols="50"></textarea>
                </div>
  
  
        </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      type de relation
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
  
  
  
  
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
  
      </div>
    </div>
  </div>
      <div class="col-12">
          <button class="btn btn-primary" type="submit" >Enregistrer</button>
      </div>
  </form>
  </div>
       `;

    document.getElementById("contenuDeDroite").innerHTML = card;
}

function montrerCarte() {
    let card = `
     
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
   
       `;

    document.getElementById("contenuDeDroite").innerHTML = card;
}
function montrerMessage(idConversation, idSession, idContact, receiverName, receiverPhoto) {

    
    

    $.ajax({
        url: "server/apis/getRowData.php",
        type: "post",
        data: {
            id: idConversation,
            action: "getAllMessage",
        },
        success: function (response) {
            let messages = JSON.parse(response);
            let card = `
             
                <input type="hidden" class="form-control is-valid" value="${idSession}" name="idUserSender" id="idUserSender" required>
                <input type="hidden" class="form-control is-valid" value="${idConversation}" name="idConvo" id="idConvo"  required>
                <input type="hidden" class="form-control is-valid" value="${idContact}" name="idUserReciver" id="idReceiver" required>
                  <div class="">
                      <div class="chat">
                          <div class="chat-header clearfix">
                              <div class="row"> 

                                  <div class="col-lg-6">
                                      <a onclick="profilMatch(${idContact})" data-toggle="modal" data-target="#view_info">
                                          <img src="server/photosMembres/${receiverPhoto}" alt="avatar">
                                      </a>  
                          
                                          <div class="chat-about">
                                              <h6 class="m-b-0">${receiverName}</h6>
                                          </div>
                                  </div>
                                  <div class="col-lg-6 hidden-sm text-right">
                                  <span ><button onclick="unmatch()">Supprimer le Match</button></span>
                                      <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                      <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                      <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                      <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
  
                                      
  
                                  </div>
                              </div>
                          </div>
                          <div class="chat-history">
                              <ul id="listConvo" class="m-b-0">
              `;
            messages.forEach((message) => {
                if (message.idSender == idSession) {
                    card += `
                          
  
                          <li class="clearfix">
                              <div class="message-data float-right">
                                  <div>
                                      <span class="message-data-time">${message.date}</span>
                                  </div>
                                  <div class="message other-message float-right">${message.content}</div>
                              </div>
                              
                          </li>        
                      `;
                } else {
                    card += `
  
                          <li class="clearfix">
                              <div class="message-data">
                                  <span class="message-data-time">${message.date}</span>
                              </div>
                              <div class="message my-message">${message.content}</div>                                    
                          </li>
                        
                      `;
                }
            });
            card += `
                              </ul>
                          </div>
                          <div class="chat-message clearfix">
                              <div class="input-group mb-0">
                                  <div class="input-group-prepend">

                                      <span class="input-group-text"><button onclick="envoyer();" class="fa fa-send">Envoyer</button></span>
                                  </div>
                                  <input onkeydown="if (event.keyCode == 13) { envoyer(); return false; }" id="contenu" value="" type="text" name= "contenu" class="form-control" placeholder="Enter text here..."/>                                    
                              </div>
                              
                          </div>
                      </div>
                  </div>
            
              `;
            
            document.getElementById("contenuDeDroite").innerHTML = card;
          
        },
    });
}

function unmatch() {
    console.log('unmatchjs');
    $.ajax({
        url: "./server/actions/unmatch.php",
        type: "post",
        data: {
            idUserSender: $('#idUserSender').val(),
            idConvo: $('#idConvo').val(),
            idUserReciver: $('#idReceiver').val(),

        },
        success: function (response) {
            console.log('unmatchjsSucces');
            // parse the JSON response
            //var data = JSON.parse(response);
            //alert(response);202s

        },
    });
}

function envoyer() {

    if ($('#contenu').val() == "") {
        return;
    }
    $.ajax({
        url: "./server/actions/sendMessage.php",
        type: "post",
        data: {
            idUserSender: $('#idUserSender').val(),
            idConvo: $('#idConvo').val(),
            idUserReciver: $('#idReceiver').val(),
            contenu: $('#contenu').val(),

        },
        success: function (response) {
            // parse the JSON response
            var data = JSON.parse(response);
            //alert(response);202
            $('#contenu').val() == " ";

        },
    });



    const date = new Date();
    const formattedDate = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2) + ' ' + ('0' + date.getHours()).slice(-2) + ':' + ('0' + date.getMinutes()).slice(-2) + ':' + ('0' + date.getSeconds()).slice(-2);

    console.log(formattedDate);

    const text = $('#contenu').val();
    const html = ` <li class="clearfix">
    <div class="message-data float-right">
        <div>
            <span class="message-data-time">${formattedDate}</span>
        </div>
        <div class="message other-message float-right">${text}</div>
    </div>
    
</li>     `;


    $("#listConvo").append(html);
    const listConvo = document.getElementById('listConvo');
    listConvo.scrollTop = listConvo.scrollHeight;

    const messageInput = document.getElementById('contenu');
    messageInput.value = '';


}
function swipeLeft(isOpen, id, idUser, name, age, height, gender, type, picture, bio) {
    let idName;
    if (isOpen) {
        idName = "profil-card-open";
    } else {
        idName = "profil-card-close";
    }

    document.getElementById(idName).className = 'card swipe-left';
    setTimeout(function () {
        if (isOpen) {
            //close see more if open
            montrerProfilClose(id, idUser, name, age, height, gender, type, picture, bio)
        }

        $.ajax({
            url: 'server/apis/getRowData.php',
            type: 'post',
            data: {
                id: id,
                idProfil: idUser,
                action: 'addSeen',
            },
            success: function (response) {
                getAllProfileNotSeen(id);
            }
        });
        document.getElementById(idName).className = 'card';
    }, 500);
}

function swipeRight(isOpen, id, idUser, name, age, height, gender, type, picture, bio) {
    let idName;
    if (isOpen) {
        idName = "profil-card-open";
    } else {
        idName = "profil-card-close";
    }

    document.getElementById(idName).className = 'card swipe-right';

    setTimeout(function () {
        if (isOpen) {
            //close see more if open
            montrerProfilClose(id, idUser, name, age, height, gender, type, picture, bio)
        }

        $.ajax({
            url: 'server/apis/getRowData.php',
            type: 'post',
            data: {
                id: id,
                idProfil: idUser,
                action: 'addLike',
            },
            success: function (response) {
                $.ajax({
                    url: 'server/apis/getRowData.php',
                    type: 'post',
                    data: {
                        id: id,
                        idProfil: idUser,
                        action: 'addSeen',
                    },
                    success: function (response) {

                        getAllProfileNotSeen(id);
                    }
                });
            }
        });
        document.getElementById(idName).className = 'card';
    }, 500);
}


function getAllProfileNotSeen(id) {

    $.ajax({
        url: 'server/apis/getRowData.php',
        type: 'post',
        data: {
            id: id,
            action: 'getAllProfilToShow',
        },
        success: function (response) {
            // parse the JSON response
            data = JSON.parse(response);

            let profil = data[0];

            let idUser = profil.idUser;
            let name = profil.firstName;
            let age = profil.age;
            let height = profil.height;
            let gender = profil.gender;


            let type = profil.typeRelation;
            let picture = profil.picture;
            let bio = profil.bio;


            if (gender == 1) {
                gender = "une Femme";
            } else if (gender == 2) {
                gender = "Un Homme";
            } else if (gender == 3) {
                gender = "Non-Binaire";
            }
           
            data.forEach((profil) => {
                console.log(profil);
                if (profil != "Il n'y plus d'utilisateur a aimer" ) {
               
            var card = `
           
            <div id="profil-close">
            <div
            class="container accordion-body d-flex justify-content-center"
            style="padding-bottom: 5%"
            id="contenu">
            <div
            id="profil-card-close"
            class="card"
            style="max-width: 400px; min-height: 700px">
            <div
            class="card-body"
            style="
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-image:
            url('server/photosMembres/${picture}');
            ">
            <div class="align-items-end" style="width: 400px">
            <div
            style="
            position: absolute;
            background: linear-gradient(
            rgb(255, 255, 255, 0),
            rgba(0, 0, 0, 0.725)
            );
            left: 0px;
            right: 0px;
            bottom: 10%;
            width: fit-content;
            ">
            <div class="row" style="margin-right: 0px; margin-left: 10px">
            <div class="col">
            <!-- Prenom -->
            <h3
            class="card-title col-3"
            style="
            color: white;
            width: max-content;
            height: fit-content;
            margin-right: 115px;
            margin-top: 500px;
            ">
            ${name}
            </h3>
            </div>
            <div class="col">
            <!-- Age -->
            <h3
            class="card-title col-3"
            style="
            color: rgba(255, 255, 255, 0.7);
            width: max-content;
            height: fit-content;
            margin-left: -125px;
            margin-top: 500px;
            ">
            ${age}
            </h3>
            </div>
            <div class="col">
            <!-- Icon recherche quelle type de relation -->
            <img
            class="card-title col-3"
            style="width: 40%; margin-left: -125px; margin-top: 500px"
            src="https://cdn-icons-png.flaticon.com/512/1029/1029183.png"
            alt=""
            />
            </div>
            <!-- position -->
            <h6
            class="card-title align-items-end"
            style="color: rgb(255, 255, 255)">
            1 km
            </h6>
            <!-- extrait de la bio -->
            <p
            class="card-title align-items-end"
            style="color: rgb(255, 255, 255, 0.7)">
            ${bio}
            </p>
            </div>
            </div>
            </div>
            </div>
            <div
            class="card-footer text-center"
            style="
            background-color: rgb(0, 0, 0);
            height: 25%;
            bottom: 0px;
            left: 0px;
            width: 100%;
            height: 10%;
            right: 0px;
            top: 100%;
            ">
            <!-- Bouton -->
            <a
            onClick="swipeLeft(false,  ${id}, ${idUser}, '${name}', ${age}, ${height}, '${gender}', '${type}', '${picture}', '${bio}');"
            class="btn btn-primary rounded-circle"
            style="
            bottom: 0px;
            height: 40px;
            width: 40px;
            border-color: rgb(157, 17, 17);
            border-radius: 5em;
            background-color: rgba(255, 255, 255, 0);
            color: rgb(157, 17, 17);
            ">X</a>
            <a
            onClick="montrerProfilOpen(${id}, ${idUser}, '${name}', ${age}, ${height}, '${gender}', '${type}', '${picture}', '${bio}');"
            class="btn btn-secondary rounded-6"
            style="
            bottom: 0px;
            border-color: rgb(255, 255, 255, 0.5);
            background-color: rgba(255, 255, 255, 0);
            color: rgb(250, 252, 250, 0.5);
            ">voir plus</a>
            <a
            onClick="swipeRight(false, ${id}, ${idUser}, '${name}', ${age}, ${height}, '${gender}', '${type}', '${picture}', '${bio}');"
            class="btn btn-primary rounded-circle"
            style="
            bottom: 0px;
            height: 40px;
            width: 40px;
            border-color: rgb(11, 144, 22);
            border-radius: 5em;
            background-color: rgba(255, 255, 255, 0);
            color: rgb(11, 144, 22);
            ">O</a>
            </div>
            </div>
            </div>
            </div>
            `;
            $('#contenuDeDroite').html(card);
         
            }else{
                var card = `

         
                <div class="card text-center bg-danger mb-3">
                    <div class="card-header">
                      
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Vous avez aimer tout les uitilisateurs</h5>
                        <p class="card-text">revenez un peu plus tard pour voir plus de profil.</p>
                      
                    </div>
                    <div class="card-footer text-muted">
                       
                    </div>
                </div>
                `;
                
                $('#contenuDeDroite').html(card);
            }
        });
     
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}


function montrerProfilClose(id, idUser, name, age, height, gender, type, picture, bio) {
    var card = `
    <div id="profil-close">
    <div
    class="container accordion-body d-flex justify-content-center"
    style="padding-bottom: 5%"
    id="contenu">
    <div
    id="profil-card-close"
    class="card"
    style="max-width: 400px; min-height: 700px">
    <div
    class="card-body"
    style="
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-image:
    url('server/photosMembres/${picture}');
    ">
    <div class="align-items-end" style="width: 400px">
    <div
    style="
    position: absolute;
    background: linear-gradient(
    rgb(255, 255, 255, 0),
    rgba(0, 0, 0, 0.725)
    );
    left: 0px;
    right: 0px;
    bottom: 10%;
    width: fit-content;
    ">
    <div class="row" style="margin-right: 0px; margin-left: 10px">
    <div class="col">
    <!-- Prenom -->
    <h3
    class="card-title col-3"
    style="
    color: white;
    width: max-content;
    height: fit-content;
    margin-right: 115px;
    margin-top: 500px;
    ">
    ${name}
    </h3>
    </div>
    <div class="col">
    <!-- Age -->
    <h3
    class="card-title col-3"
    style="
    color: rgba(255, 255, 255, 0.7);
    width: max-content;
    height: fit-content;
    margin-left: -125px;
    margin-top: 500px;
    ">
    ${age}
    </h3>
    </div>
    <div class="col">
    <!-- Icon recherche quelle type de relation -->
    <img
    class="card-title col-3"
    style="width: 40%; margin-left: -125px; margin-top: 500px"
    src="https://cdn-icons-png.flaticon.com/512/1029/1029183.png"
    alt=""
    />
    </div>
    <!-- position -->
    <h6
    class="card-title align-items-end"
    style="color: rgb(255, 255, 255)">
    1 km
    </h6>
    <!-- extrait de la bio -->
    <p
    class="card-title align-items-end"
    style="color: rgb(255, 255, 255, 0.7)">
    ${bio}
    </p>
    </div>
    </div>
    </div>
    </div>
    <div
    class="card-footer text-center"
    style="
    background-color: rgb(0, 0, 0);
    height: 25%;
    bottom: 0px;
    left: 0px;
    width: 100%;
    height: 10%;
    right: 0px;
    top: 100%;
    ">
    <!-- Bouton -->
    <a
    onClick="swipeLeft(false,  ${id}, ${idUser}, '${name}', ${age}, ${height}, '${gender}', '${type}', '${picture}', '${bio}');"
    class="btn btn-primary rounded-circle"
    style="
    bottom: 0px;
    height: 40px;
    width: 40px;
    border-color: rgb(157, 17, 17);
    border-radius: 5em;
    background-color: rgba(255, 255, 255, 0);
    color: rgb(157, 17, 17);
    ">X</a>
    <a
    onClick="montrerProfilOpen(${id}, ${idUser}, '${name}', ${age}, ${height}, '${gender}', '${type}', '${picture}', '${bio}');"
    class="btn btn-secondary rounded-6"
    style="
    bottom: 0px;
    border-color: rgb(255, 255, 255, 0.5);
    background-color: rgba(255, 255, 255, 0);
    color: rgb(250, 252, 250, 0.5);
    ">voir plus</a>
    <a
    onClick="swipeRight(false, ${id}, ${idUser}, '${name}', ${age}, ${height}, '${gender}', '${type}', '${picture}', '${bio}');"
    class="btn btn-primary rounded-circle"
    style="
    bottom: 0px;
    height: 40px;
    width: 40px;
    border-color: rgb(11, 144, 22);
    border-radius: 5em;
    background-color: rgba(255, 255, 255, 0);
    color: rgb(11, 144, 22);
    ">O</a>
    </div>
    </div>
    </div>
    </div>
    `;
    $('#contenuDeDroite').html(card);

}



function montrerProfilOpen(id, idUser, name, age, height, gender, type, picture, bio) {

    var card = `
    <div id="profil-open">
    <div
    class="container accordion-body d-flex justify-content-center"
    style="padding-bottom: 5%"
    id="contenu">
    <div
    id="profil-card-open"
    class="card"
    style="max-width: 400px; min-height: 700px">
    <div
    class="card-body"
    style="
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-image:
    url('server/photosMembres/${picture}');
    ">
    <div
    class="align-items-end"
    style="width: 400px;">
    <div
    style="
    left: 0px;
    right: 0px;
    ">
    <div class="row" style="margin-right: 0px">
    <div class="col">
    <!-- Prenom -->
    <h3
    class="card-title col-3"
    style="
    color: white;
    width: max-content;
    height: fit-content;
    margin-right: 115px;
    margin-top: 500px;
    ">
    ${name}
    </h3>
    </div>
    <div class="col">
    <!-- Age -->
    <h3
    class="card-title col-3"
    style="
    color: rgba(255, 255, 255, 0.7);
    width: max-content;
    height: fit-content;
    margin-left: -125px;
    margin-top: 500px;
    ">
    ${age}
    </h3>
    </div>
    <div class="col">
    <!-- Icon recherche quelle type de relation -->
    <img
    class="card-title col-3"
    style="width: 40%; margin-left: -125px; margin-top: 500px"
    src="https://cdn-icons-png.flaticon.com/512/1029/1029183.png"
    alt=""
    />
    </div>
    <!-- position -->
    <h6
    class="card-title align-items-end"
    style="color: rgb(255, 255, 255)">
    1 km
    </h6>
    </div>
    </div>
    </div>
    </div>
    <div
    class="card"
    style="
    color: white;
    top: 5%;
    position: sticky;
    background-color: black;
    margin-top: -9px;
    max-width: 400px;
    height: auto;
    ">
    <div class="card-body">
    <h6>Bio</h6>
    <p
    class="card-title align-items-end"
    style="color: rgb(255, 255, 255, 0.7)">
    ${bio}
    </p>
    </div>
    <div class="card-body">
    <h6>
    Genre
    <img
    style="width: 8%"
    src="https://cdn-icons-png.flaticon.com/512/3673/3673582.png"
    alt=""
    />
    </h6>
    <p style="color: rgb(255, 255, 255, 0.7)">
    Je suis
    ${gender}
    </p>
    </div>
    <div class="card-body">
    <h6>
    Relations
    <img
    style="width: 8%"
    src="https://cdn-icons-png.flaticon.com/512/1029/1029183.png"
    alt=""
    />
    </h6>
    <p style="color: rgb(255, 255, 255, 0.7)">
    Je recherche
    ${type}
    </p>
    </div>
    <div class="card-body">
    <h6>
    Taille
    <img
    style="width: 8%"
    src="https://cdn-icons-png.flaticon.com/512/5478/5478995.png"
    alt=""
    />
    </h6>
    <p style="color: rgb(255, 255, 255, 0.7)">
    Je mesure
    ${height}
    cm
    </p>
    </div>
    <div
    class="card-footer text-center"
    style="
    position: relative;
    background-color: rgb(0, 0, 0);
    height: 25%;
    ">
    <a
    onClick="swipeLeft(true, ${id}, ${idUser}, '${name}', ${age}, ${height}, '${gender}', '${type}', '${picture}', '${bio}');"
    class="btn btn-primary rounded-circle"
    style="
    height: 40px;
    width: 40px;
    border-color: rgb(157, 17, 17);
    border-radius: 5em;
    background-color: rgba(255, 255, 255, 0);
    color: rgb(157, 17, 17);
    ">X</a>
    <a
    onClick="montrerProfilClose(${id}, ${idUser}, '${name}', ${age}, ${height}, '${gender}', '${type}', '${picture}', '${bio}');"
    class="btn btn-secondary rounded-6"
    style="
    border-color: rgb(255, 255, 255, 0.5);
    background-color: rgba(255, 255, 255, 0);
    color: rgb(250, 252, 250, 0.5);
    ">voir moins</a>
    <a
    onClick="swipeRight(true, ${id}, ${idUser}, '${name}', ${age}, ${height}, '${gender}', '${type}', '${picture}', '${bio}');"
    class="btn btn-primary rounded-circle"
    style="
    height: 40px;
    width: 40px;
    border-color: rgb(11, 144, 22);
    border-radius: 5em;
    background-color: rgba(255, 255, 255, 0);
    color: rgb(11, 144, 22);
    ">O</a>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    `;
    $('#contenuDeDroite').html(card);

}


function profilMatch(id) {
    $.ajax({
        url: 'server/apis/getRowData.php',
        type: 'post',
        data: {
            id: id,
            action: 'getRowDataProfil',
        },
        success: function (response) {
            // parse the JSON response
            data = JSON.parse(response);
            


            var name = data.firstName;
            var age = data.age;
            var height = data.height;
            var gender = data.gender;
            var type = data.typeRelation;
            var picture = data.picture;
            var bio = data.bio;

            var nomGender;
            var nomType;

            if(type == 'coup'){
                nomType = "Un coup d'un soir"
            }else if(type == 'rien'){
                nomType = 'Rien de serieux';
            }else if(type == 'friend'){
                nomType = 'Un Sex Friend';
            }else if(type == 'serieux'){
                nomType = 'Une relation serieuse';
            }
            console.log(nomType);

            if (gender == 1) {
                nomGender = "une Femme";
            } else if (gender == 2) {
                nomGender = "Un Homme";
            } else if (gender == 3) {
                nomGender = "Non-Binaire";
            }

            var card = `
            <div class="modal fade" id="enregModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            
                
            <div id="profil-open">
            <div
            class="container accordion-body d-flex justify-content-center"
            style="padding-bottom: 5%"
            id="contenu">
            <div
            id="profil-card-open"
            class="card"
            style="max-width: 400px; min-height: 700px">
            <div
            class="card-body"
            style="
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-image:
            url('server/photosMembres/${picture}');
            ">
            <div
            class="align-items-end"
            style="width: 400px;">
            <div
            style="
            left: 0px;
            right: 0px;
            ">
            <div class="row" style="margin-right: 0px">
            <div class="col">
            <!-- Prenom -->
            <h3
            class="card-title col-3"
            style="
            color: white;
            width: max-content;
            height: fit-content;
            margin-right: 115px;
            margin-top: 500px;
            ">
            ${name}
            </h3>
            </div>
            <div class="col">
            <!-- Age -->
            <h3
            class="card-title col-3"
            style="
            color: rgba(255, 255, 255, 0.7);
            width: max-content;
            height: fit-content;
            margin-left: -125px;
            margin-top: 500px;
            ">
            ${age}
            </h3>
            </div>
            <div class="col">
            <!-- Icon recherche quelle type de relation -->
            <img
            class="card-title col-3"
            style="width: 40%; margin-left: -125px; margin-top: 500px"
            src="https://cdn-icons-png.flaticon.com/512/1029/1029183.png"
            alt=""
            />
            </div>
            <!-- position -->
            <h6
            class="card-title align-items-end"
            style="color: rgb(255, 255, 255)">
            1 km
            </h6>
            </div>
            </div>
            </div>
            </div>
            <div
            class="card"
            style="
            color: white;
            top: 5%;
            position: sticky;
            background-color: black;
            margin-top: -9px;
            max-width: 400px;
            height: auto;
            ">
            <div class="card-body">
            <h6>Bio</h6>
            <p
            class="card-title align-items-end"
            style="color: rgb(255, 255, 255, 0.7)">
            ${bio}
            </p>
            </div>
            <div class="card-body">
            <h6>
            Genre
            <img
            style="width: 8%"
            src="https://cdn-icons-png.flaticon.com/512/3673/3673582.png"
            alt=""
            />
            </h6>
            <p style="color: rgb(255, 255, 255, 0.7)">
            Je suis
            ${nomGender}
            </p>
            </div>
            <div class="card-body">
            <h6>
            Relations
            <img
            style="width: 8%"
            src="https://cdn-icons-png.flaticon.com/512/1029/1029183.png"
            alt=""
            />
            </h6>
            <p style="color: rgb(255, 255, 255, 0.7)">
            Je recherche
            ${nomType}
            </p>
            </div>
            <div class="card-body">
            <h6>
            Taille
            <img
            style="width: 8%"
            src="https://cdn-icons-png.flaticon.com/512/5478/5478995.png"
            alt=""
            />
            </h6>
            <p style="color: rgb(255, 255, 255, 0.7)">
            Je mesure
            ${height}
            cm
            </p>
            </div>
            <div
            class="card-footer text-center"
            style="
            position: relative;
            background-color: rgb(0, 0, 0);
            height: 25%;
            ">
            </div>
            </div>
            </div>
            </div>
            </div>
            
            
        </div>
    </div>
            `;
            document.getElementById("contenuModalProfil").innerHTML = card;
            $("#enregModal").modal("show");
        },
        error: function (xhr, status, error) {
            alert(error);
        }
    });
}

function afficherMatches(matchesToShow){

   
    var card = `
    <div class="modal fade" id="enregModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
    
            <div class="card text-center bg-danger mb-3">
            
                <div class="card-body">
                    <h5 class="card-title">nouveaux matchs allez voir son profil! </h5>`
                        matchesToShow.forEach(e=>card+="<div>"+e.firstName+"</div>")
                        card+= `

                </div>
                
            </div>

        </div>
    </div>
       
    `;
    
    document.getElementById("contenuModalProfil").innerHTML = card;
    $("#enregModal2").modal("show");
   
}

function updateViewed(id1,id2) {
    
 
    $.ajax({
      type: 'POST',
      url: 'server/apis/getRowData.php ',
      data: { 
        id1: id1,
        id2: id2, 
        action: 'update-viewed',
    },
      success: function() {
        console.log('Viewed updated successfully');
      },
      error: function() {
        console.log('Failed to update viewed');
      }
    });
  }