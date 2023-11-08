<?php
include "connect.php";
ob_start();
session_start();

$nom=$_POST['nom'];
$idE=$_SESSION['idEquipe'];
$idT=$_SESSION['idTournoi'];

//Modification du nom de l'équipe dans la BD
$sql="UPDATE equipe SET nom='$nom' WHERE idEquipe=$idE";

if($mysqli->query($sql)==true){
    echo "Informations bien modifiées";
    header("Refresh: 0.5; url=CreerEquipe.php?idTournoi=$idT");
}
else{
    echo "Impossible";
}

?>