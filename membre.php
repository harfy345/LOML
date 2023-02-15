<?php

session_start();

// vous mettez ca dans une page que vous voulez pas que l'utilisateur ait acces sans connexion 
if (!isset($_SESSION['username'])) {
    header("location:./conexion.php");
}
$_SESSION['active_page'] = 'membre';
$pagetitre = "index";

require_once ("./server/apis/membre.php");
include "./public/util/header.php";

$membreapi = new MembreAPI();
$membreapi->connect();
$profil = $membreapi->verifierUserProfil($_SESSION['id']);
$profilActive = $membreapi->verifierUserActive($_SESSION['id']);
$membreapi->disconnect();

if ($profilActive -> active == 0) {
    $msg="Vous avez été bani";
    header("location:./conexion.php?msg=$msg");
}




if (!$profil) {
?>

    <script>
        window.onload = function() {
            popupProfileMembre();
        }
    </script>


<?php
}
?>

<div class="container" id="contenuModalProfil">

</div>


<div class="container" style="display: flex;">
  <div class="sidebar-menu" style="flex: 3;">
                        
        <!--Main Navigation-->
        <header>
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-4">



                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button onclick="montrerProfil(<?php echo($_SESSION['id']) ?>);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Compte
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body"></div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Conversations
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                <?php

                                    $membreapi->connect();

                                    $convos = $membreapi->getAllConvosPourUser($_SESSION['id']);

                                    $membreapi->disconnect();


                                    while ($row = mysqli_fetch_array($convos)) {
                                        
                                        if($row['idUser1'] == $_SESSION['id']) {
                                        ?>

                                        <button onclick="montrerMessage(<?php echo($row['idConversation'])?>, <?php echo($_SESSION['id'])?>);" type="button" class="btn btn-secondary btn-lg btn-block"><?php echo $row['firstName2']; ?></button>

                                    
                                        <?php
                                        } else {
                                        ?>
                                        <button onclick="montrerMessage(<?php echo($row['idConversation'])?>, <?php echo($_SESSION['id'])?>);" type="button" class="btn btn-secondary btn-lg btn-block"><?php echo $row['firstName1']; ?></button>

                                    <?php
                                    } } 
                                    
                                      ?>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Matches
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">

                                    <?php

                                    $membreapi->connect();

                                    $matches = $membreapi->getAllMatchesPourUser($_SESSION['id']);

                                    $membreapi->disconnect();

                                    while ($row = mysqli_fetch_array($matches)) {
                                        
                                        if($row['idUser1'] == $_SESSION['id']) {
                                        ?>

                                        <button  type="button"  class="btn btn-secondary btn-lg btn-block"><?php echo $row['firstName2']; ?></button>

                                    
                                        <?php
                                        } else {
                                        ?>
                                        <button  type="button"  class="btn btn-secondary btn-lg btn-block"><?php echo $row['firstName1']; ?></button>

                                    <?php
                                    } } 
                                    
                                      ?>



                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($_SESSION['isAdmin']) {
                            ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
                                            Page Admin
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <a href="./admin.php" class="nav-link px-0 align-middle">
                                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline"> Page admin</span></a>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>


                            <button onclick="montrerCarte();" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-headingRencontre" aria-expanded="false" aria-controls="flush-headingRencontre">
                                rencontres
                            </button>



                        </div>

                    </div>
                </div>
            </nav>
            <!-- Sidebar -->

        </header>
        <!--Main Navigation-->
  </div>
  <div class="chat" style="flex: 7;">

    <div id="contenuDeDroite" class="container justify-content-center">

    </div>
  
  </div>
</div>


<?php

require_once("./public/util/footer.php");

?>