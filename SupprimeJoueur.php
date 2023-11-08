<?php
include 'Connect.php';
ob_start();
session_start();
  $idJ=$_GET['idJoueur'];
  $idT=$_SESSION['idTournoi'];
  $idEquipe=$_SESSION['idEquipe'];
  $mail=$_GET['mail'];

	//Suppression du joueur de la BD
    $sql="DELETE FROM joueur WHERE idJoueur='$idJ'";
	$sqlsupp="DELETE FROM utilisateur WHERE mail='$mail'";
	if(($mysqli->query($sql))==true&&($mysqli->query($sqlsupp)==true))
	{
      echo "Joueur supprimé";

	  //Renvoi sur la page associé au role de l'utilisateur
	  if($_SESSION['_role']==1){
	  header("Refresh: 2; url=AjoutJoueur.php?idEquipe=$idEquipe");
	  }
	  else{
	  header("Refresh: 2; url=MonEquipe.php?idEquipe=$idEquipe");  
	  }

	}
	else{
		echo "Suppression impossible";

		if($_SESSION['_role']==1){
			header("Refresh: 2; url=AjoutJoueur.php?idEquipe=$idEquipe");
			}
			else{
			header("Refresh: 0.5; url=MonEquipe.php?idEquipe=$idEquipe");	
			} 
	}
?>