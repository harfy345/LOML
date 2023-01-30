<?php
session_start();

if (session_id()) {
    header("location:./index.php");
    
} else header("location:./conexion.php");



?>
