<?php

session_start();

if(!isset($_SESSION['isAdmin']) || empty($_SESSION['isAdmin']) )  header("location:./conexion.php");

// vous mettez ca dans une page que vous voulez pas que l'utilisateur ait acces sans connexion 

if (!isset($_SESSION['username'])) {
    header("location:./conexion.php");
}

$pagetitre = "index";
require_once("./public/util/headeradmin.php");
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

</body>
</html>

<?php

require_once("./public/util/footer.php");

?>