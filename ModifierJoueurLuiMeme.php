<?php
include "Connect.php";
ob_start();
session_start();
$id=$_SESSION['idJoueur'];
$nom=$_POST['Nom'];
$prenom=$_POST['Prenom'];

//modification des informations du joueur dans la BD
$sql="UPDATE joueur SET nom='$nom' , prenom='$prenom' WHERE idJoueur=$id";

if($mysqli->query($sql)==true){
    echo "Informations bien modifiées";
    header("Refresh: 0.5; url=MesInformation.php?idJoueur=$id");
}
else{
    echo "Impossible";
}

?>