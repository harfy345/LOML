

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