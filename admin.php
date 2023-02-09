<?php

session_start();

if(!isset($_SESSION['isAdmin']) || empty($_SESSION['isAdmin']) )  header("location:./conexion.php");

// vous mettez ca dans une page que vous voulez pas que l'utilisateur ait acces sans connexion 

if (!isset($_SESSION['username'])) {
    header("location:./conexion.php");
}
$_SESSION['active_page'] = 'admin';
$pagetitre = "index";
require_once("./public/util/header.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>

<div class = "container" id = "contenu">

</div>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="javascript:montrerFormEnreg();" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Enregister</span> </a>
                        
                    </li>
                    <li>
                        <a href="./membre.php" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline"> Page Membres</span></a>
                    </li> 
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="40" height="40" class="rounded-circle">
                       
                        <span class="d-none d-sm-inline mx-1">#TODO</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./deconnexion.php">Se déconnecter</a></li>
                    </ul>
                </div>
                
            </div>
        </div>


        <div class="col py-4">      
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
            require_once("server/DB/databaseRequests.php");

            $requete="SELECT users.* , connection.email, connection.pass
            FROM users INNER JOIN connection ON users.idUser =connection.idUser";
          
            $result = mysqli_query($connexion, $requete);



            while($row = mysqli_fetch_array($result)) {
        ?>
              <tr id="<?php echo $row["idUser"]; ?>">
                <td><?php echo $row["idUser"]; ?></td>
                <td><?php echo $row["firstName"]; ?></td>
                <td><?php echo $row["lastName"]; ?></td>
                <td><?php echo $row["admin"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["pass"]; ?></td>
                <td>
                    <button type="button" id="btnEdit" class="btn btn-warning" onclick="editRow(<?php echo $row["idUser"]; ?>)">Edit</button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="deleteRow(<?php echo $row["idUser"]; ?>)">delete</button>
                </td>

        <?php
            }
        ?>
        </tbody>

        </table>

     </div>
        <div 
        id="coverScreen"  class="LockOn">
        </div>
    </div>
</div>
</body>

</html>

<?php

require_once("public/util/footer.php");

?>