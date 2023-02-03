$(window).on('load', function () {
    $("#coverScreen").hide();
});

$("#btnrecherche, #btnEdit").click(function () {
    $("#coverScreen").show();
});
$("#contenu").click(function () {
    $("#coverScreen").hide();
});

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


function deleteAll() {
    let form = `
    <!-- Modal pour enregistrer patient -->
        <div class="modal fade" id="enregModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Supprimer tout les membres</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="formEnreg" action="server/actions/deleteMembre.php" method="POST">
                        <h3>voulez-vous tout suprimer?</h3>
                        
                        <div class="col-12">
                            <button class="btn btn-danger" type="submit" >Supprimer</button>
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



function recherche() {
    var valeurRecherche = $('#inputReche').val();

    $.ajax({
        
        url: 'server/apis/membre.php',
        type: 'post',
        data: {
            valeur: valeurRecherche,
            action: 'getMembreParEmail',
        },
        success: function(response) {
            // parse the JSON response
            var data = JSON.parse(response);
            // fill the form inputs with the data
            alert(response);
            $('#FirstName').val(data.firstName);
            $('#LastName').val(data.lastName);
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
}
