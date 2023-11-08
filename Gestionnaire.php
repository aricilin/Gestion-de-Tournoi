<?php 
 
include("Login.php");
ob_start();
session_start();

//on vérifie que le login existe dans session
if(!isset($_SESSION["login"])){
    header("Location:indexGestionnaire.php");
}
else {
    echo "<center>Bienvenue sur la page de gestionnaire ";
    echo "<a href=logout.php>Guvenli cikis</a></center>";
}
?>