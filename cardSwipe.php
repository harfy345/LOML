

<?php

$membreapi->connect();

$convos = $membreapi->getAllProfil();

$membreapi->disconnect();

$row = mysqli_fetch_array($convos);

while ($row) { 
    
    //setValeur to data
    $numSexe = $row['gender'];
    if($numSexe == 1){
        $sexe = "un homme";
    }elseif ($numSexe == 2){
        $sexe = "une femme";
    }elseif ($numSexe == 3){
        $sexe = "non binaire";
    }else {
        $sexe = "rien bruh";
    }
    
    //-->
    ?> 
       
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
            url('https://static1.purepeople.com/articles/5/43/24/55/@/6216245-annily-chatelain-la-fille-d-alizee-et-j-950x0-2.jpg');
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
                       <?php echo $row['firstName']; ?>
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
                      <!-- <?php echo $row['age']; ?> -->18
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
                    il y pas de bio dans la base
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
              onClick="swipeLeft(false, <?php echo($_SESSION['id']) ?>, <?php echo $row['idUser'];?>);"
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
              onClick="closeProfil();"
              class="btn btn-secondary rounded-6"
              style="
              bottom: 0px;
              border-color: rgb(255, 255, 255, 0.5);
              background-color: rgba(255, 255, 255, 0);
              color: rgb(250, 252, 250, 0.5);
              ">voir plus</a>
            <a
              onClick="swipeRight(false, <?php echo($_SESSION['id']) ?>, <?php echo $row['idUser'];?>);"
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
            url('https://static1.purepeople.com/articles/5/43/24/55/@/6216245-annily-chatelain-la-fille-d-alizee-et-j-950x0-2.jpg');
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
                       <?php echo $row['firstName']; ?> 
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
                       <?php echo $row['age']; ?>
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
                <?php echo $row['bio']; ?>
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
                  <?php echo $sexe ?>
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
                    <?php echo $row['typeRelation']; ?>
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
                      <?php echo $row['height']; ?>
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
                        onClick="swipeLeft(true, <?php echo($_SESSION['id']) ?>, <?php echo $row['idUser'];?>);"
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
                        onClick="closeProfil();"
                        class="btn btn-secondary rounded-6"
                        style="
                        border-color: rgb(255, 255, 255, 0.5);
                        background-color: rgba(255, 255, 255, 0);
                        color: rgb(250, 252, 250, 0.5);
                        ">voir moins</a>
                      <a
                        onClick="swipeRight(true, <?php echo($_SESSION['id']) ?>, <?php echo $row['idUser']; ?> );"
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
    <?php
    break;
  }

require_once("./public/util/footer.php");


?>

<script>
        window.onload = function() {
          closeAllProfil();
        }
</script>