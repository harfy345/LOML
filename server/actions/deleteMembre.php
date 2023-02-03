<?php
    require_once("../DB/databaseRequests.php");

    $requette = "DELETE FROM users";

    $stmt = $connexion->prepare($requette);

    $stmt->execute();
    header("location:".$_SERVER['HTTP_REFERER']);

    mysqli_close($connexion);

?>