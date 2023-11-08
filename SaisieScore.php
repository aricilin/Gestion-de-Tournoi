<?php
include "Connect.php";
ob_start();
session_start();
$idT=$_SESSION['idTournoi'];
$idM=$_SESSION['idMatch'];
$score1=$_POST['Score1'];
$score2=$_POST['Score2'];

//Mise à jour des scores dans la BD
$sql="UPDATE matches SET score1=$score1 , score2=$score2 WHERE idMatch=$idM";
$saisie=$mysqli->query($sql);

$_scoreReq="SELECT score1, score2, equipe1, equipe2
			FROM matches
			WHERE idMatch=$idM";

$_scoreTab=$mysqli->query($_scoreReq);
$_gagnant;
while($_scoreEntree=mysqli_fetch_array($_scoreTab))
{
   if(($_scoreEntree['score1']>$_scoreEntree['score2'])){
	$_gagnant=$_scoreEntree['equipe1'];
   }else if(($_scoreEntree['score1']<$_scoreEntree['score2'])){
	   $_gagnant=$_scoreEntree['equipe2'];
   }
    if(empty($_gagnant)){
		echo "Match nul. Veuillez saisir les scores à nouveau";
		header("Refresh: 2; url=ArbreDesMatches.php?idTournoi=$idT");
	}
   		
		   $equipe="SELECT * FROM equipe WHERE idEquipe=$_gagnant";
			$prend=$mysqli->query($equipe);
			$eq=mysqli_fetch_array($prend);
     $niveau=$eq['niveau'];

   $mysqli->query("UPDATE equipe 
					SET niveau=$niveau+1
					WHERE idEquipe=$_gagnant");

header("Refresh: 0.5; url=ArbreDesMatches.php?idTournoi=$idT");
}



?>