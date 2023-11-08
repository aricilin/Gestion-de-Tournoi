<?php
include "Connect.php";
ob_start();
session_start();
$idEquipe=$_SESSION['idEquipe'];
$id=$_SESSION['idJoueur'];
$nom=$_POST['Nom'];
$prenom=$_POST['Prenom'];
    
//modification des informations du joueur dans la BD
$sql="UPDATE joueur SET nom='$nom' , prenom='$prenom' WHERE idJoueur=$id";

if($mysqli->query($sql)==true){
    echo "Informations bien modifiées";
	if($_SESSION['_role']==1){
    header("Refresh: 0.5; url=AjoutJoueur.php?idEquipe=$idEquipe");
	}
	else{
		header("Refresh: 0.5; url=MonEquipe.php?idEquipe=$idEquipe");
	}
}
else{
    echo "Impossible";
}

?>