
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


let listerMembre = () =>{

    let form = `
    <!-- Modal pour enregistrer patient -->
        <div class="modal fade" id="enregModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lister membre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>						
                                    <th>NOM</th>
                                    <th>PRENOM</th>
                                    <th>ADMIN</th>
                                    <th>EMAIL</th>
                                    <th>PASS</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    //require_once("server/apis/membre.php");
                                    require_once("../../server/DB/databaseRequests.php");

                                    $requete="SELECT users.* , connection.email, connection.pass
                                    FROM users INNER JOIN connection ON users.idUser =connection.idUser";
                                
                                    $result = mysqli_query($connexion, $requete);
                                

                                    while($row = mysqli_fetch_array($result)) {
                                ?>
                                        <tr id="<?php echo $row["id"]; ?>">
                                        <td><?php echo $row["idUser"]; ?></td>
                                        <td><?php echo $row["firstName"]; ?></td>
                                        <td><?php echo $row["lastName"]; ?></td>
                                        <td><?php echo $row["admin"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["pass"]; ?></td>

                                <?php
                                    }
                                ?>
                            </tbody>

                        </table>
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