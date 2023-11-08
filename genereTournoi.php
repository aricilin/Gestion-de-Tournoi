<?php
include 'Connect.php';
ob_start();
session_start();


$_nbEquipes= $_POST['nbEquipes'];
$_SESSION['nbEquipes'] = $_nbEquipes;
$_Nom = $_POST['nom'];
$_Lieu = $_POST['lieu'];
$_Date = $_POST['start-time'];
$id=$_SESSION["id"];
$niveau=0;

//On créé le tournoi dans la BD
$sqlAjout="INSERT INTO tournoi(nom, dateDebut, lieu, nombreEquipes,niveau,QuiGere) 
VALUES ('$_Nom','$_Date', '$_Lieu', '$_nbEquipes',$niveau,'$id')";

if($mysqli->query($sqlAjout)==true){
	echo "Tournoi bien créé";
    header("Refresh: 1; url=MesTournois.php");
}
 
?>