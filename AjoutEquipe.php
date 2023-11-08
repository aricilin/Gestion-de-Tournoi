<?php
include 'Connect.php';
ob_start();
session_start();

$Niveau=1;
$Nom=$_POST['nom'];
$nbEquipe=$_SESSION['nbEquipes'];
$idT=$_SESSION['idTournoi'];

$result = $mysqli->query("SELECT * FROM equipe WHERE tournoiContient=$idT"); 
/* Détermine le nombre de lignes du jeu de résultats */
$row_cnt = $result->num_rows;

if($nbEquipe>$row_cnt){
  $sqlAjout="INSERT INTO equipe(nom,niveau,tournoiContient) VALUES ('$Nom','$Niveau',$idT)";
  $sqlcheck=$mysqli->query($sqlAjout);
  if($sqlcheck==true){
	  echo "Equipe bien créée";
    if($_SESSION['_role']==1){
	    header("Refresh: 0.5; url=CreerEquipe.php?idTournoi=$idT");
    }
    else{
	    header("Refresh: 0.5; url=ApplicationTournois.php");
    }
  }
  else{
	  echo "Impossible";
  }
}
else{
  echo "Limite d'équipes atteint";
  if($_SESSION['_role']==1){
	  header("Refresh: 0.5; url=CreerEquipe.php?idTournoi=$idT");
  }
  else{
	  header("Refresh: 0.5; url=ApplicationTournois.php");
  }
}

?>


