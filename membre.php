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
$matches = $membreapi->getAllMatchesPourUser($_SESSION['id']);
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


<div  style="display: flex;">
  <div  style="flex: 2; ">
                        
        <!--Main Navigation-->
        <header style="w-25">
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

                                        <button onclick="montrerMessage(<?php echo($row['idConversation'])?>, <?php echo($_SESSION['id'])?>, <?php echo($row['idUser2'])?>, '<?php echo($row['firstName2'])?>', '<?php echo($row['picture2'])?>');"
                                         type="button" class="btn btn-secondary btn-lg btn-block"><?php echo $row['firstName2']; ?></button>

                                    
                                        <?php
                                        } else {
                                        ?>
                                        <button onclick="montrerMessage(<?php echo($row['idConversation'])?>, <?php echo($_SESSION['id'])?>, <?php echo($row['idUser1'])?>, '<?php echo($row['firstName1'])?>', '<?php echo($row['picture1'])?>');"
                                         type="button" class="btn btn-secondary btn-lg btn-block"><?php echo $row['firstName1']; ?></button>

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
                                    <script>
                                    
                                    const matchesToShow = [];
                                    </script>
                                    <?php

                                    while ($row = mysqli_fetch_array($matches)) {
                                       
                                       
                                        if($row['idUser1'] == $_SESSION['id']) {
                                        ?>
                                        
                                        <?php if($row['viewed'] == 0){
                                            ?>
                                             <script>
                                           
                                                matchesToShow.push({firstName: '<?php echo $row['firstName2']; ?>'});
                                               
                                            </script>
                                        <?php
                                            }
                                                ?>
                                       

                                        <button  type="button" onclick="profilMatch(<?php echo($row['idUser2']) ?>); updateViewed(<?php echo $row['idUser2']; ?>,<?php echo $row['idUser1']; ?>);"  class="btn btn-secondary btn-lg btn-block"><?php echo $row['firstName2']; ?></button>
                                        <button type="button" class="btn-close" aria-label="Close" onclick=unmatch()></button>
                                    
                                        <?php
                                        } else {
                                        ?>
                                     
                                        
                                         <?php if($row['viewed'] == 0){
                                            ?>
                                            
                                            <script>
                                    
                                                matchesToShow.push({firstName: '<?php echo $row['firstName1']; ?>'});
                                               
                                            </script>
                                        <?php
                                            }
                                                ?>
                                       
                                       <button type="button" onclick="profilMatch(<?php echo $row['idUser1']; ?>); updateViewed(<?php echo $row['idUser1']; ?>,<?php echo $row['idUser2']; ?>);" class="btn btn-secondary btn-lg btn-block"><?php echo $row['firstName1']; ?></button>
                                       <button type="button" class="btn-close" aria-label="Close" onclick=unmatch()></button>


                                    <?php
                                    } } 
                                      ?>

                                    <script>
                                        if (matchesToShow.length === 0) {
                                            console.log("Le tableau est vide !");
                                        }
                                        else{
                                          
                                            afficherMatches(matchesToShow);
                                        }
                                   
                                    </script>

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

                        <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button onclick="getAllProfileNotSeen(<?php echo($_SESSION['id']) ?>);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                Rencontres
                            </button>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body"></div>
                                </div>
                        </h2>
                        </div>

                            <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingSix">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseThree">
                                            Abonnement
                                        </button>
                                    </h2>
                                    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            
                                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                        <input type="hidden" name="cmd" value="_xclick-subscriptions">
                                        <input type="hidden" name="business" value="totof2724@hotmail.com">
                                        <input type="hidden" name="lc" value="CA">
                                        <input type="hidden" name="item_name" value="Premium">
                                        <input type="hidden" name="no_note" value="1">
                                        <input type="hidden" name="src" value="1">
                                        <input type="hidden" name="currency_code" value="CAD">
                                        <input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHostedGuest">
                                        <table>
                                        <tr><td><input type="hidden" name="on0" value=""></td></tr><tr><td><select name="os0">
                                            <option value="Premium">Premium : $25.00 CAD - mensuel</option>
                                            <option value="Boost">Boost : $36.00 CAD - mensuel</option>
                                        </select> </td></tr>
                                        </table>
                                        <input type="hidden" name="option_select0" value="Premium">
                                        <input type="hidden" name="option_amount0" value="25.00">
                                        <input type="hidden" name="option_period0" value="M">
                                        <input type="hidden" name="option_frequency0" value="1">
                                        <input type="hidden" name="option_select1" value="Boost">
                                        <input type="hidden" name="option_amount1" value="36.00">
                                        <input type="hidden" name="option_period1" value="M">
                                        <input type="hidden" name="option_frequency1" value="1">
                                        <input type="hidden" name="option_index" value="0">
                                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
                                        <img alt="" border="0" src="https://www.paypalobjects.com/fr_XC/i/scr/pixel.gif" width="1" height="1">
                                        </form>



                                        </div>
                                    </div>
                                </div>



                        </div>

                    </div>
                </div>
            </nav>
            <!-- Sidebar -->

        </header>
        <!--Main Navigation-->
  </div>


  <div  style="flex: 7;">

    <div id="contenuDeDroite" class="container ">

    </div>
  
  </div>
</div>


<?php

require_once("./public/util/footer.php");

?>