<!doctype html>
<link href="site.css" rel="stylesheet" media="all" type="text/css">
<html lang="fr">
<head>
<meta charset="UTF8" />
<link rel="stylesheet" href="Index.css" />
<link href=".htaccess" />
<title>
   Championnat 
</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
include 'Connect.php';
session_start();
ob_start();
$_SESSION['idTournoi']=$_GET['idTournoi'];
$_SESSION['nbEquipes']=$_GET['nbequipes'];
?>

<div class="co">
	<a class="active" href="Logout.php">Déconnexion</a>
</div>
<div class="top">
	<div class='slide1'></div>
	<div class='slide2'></div>
	<div class='slide3'></div>
</div>

<div class="topnav">
	<a class="active" href="IndexGestionnaire.html">Accueil</a>
	<a href="ListeTournoiGestionnaire.php">Liste Des Tournois</a>
	<a href="CreerTournoi.php">Créer Tournoi</a>
	<a href="MesTournois.php">Mes Tournois</a>  
</div>

<div class="back">
	<div align=center >
	<table style="width: 60%" border="1">
	<tr>
        <th>numero de Match</th>
		<th>idMatch</th>
		<th>score1</th>
		<th>score2</th>
		<th>_date</th>
		<th>DansLeTournoi</th>
		<th>equipe 1</th>
		<th>equipe 2</th>
		<th>gagnant</th>
	
	</tr>

<?php
$idT=$_SESSION['idTournoi'];
$sql=$mysqli->query("SELECT * FROM matches WHERE OrganisePar=$idT" );
$sqlajout=$mysqli->query("SELECT * FROM tournoi WHERE idTournoi=$idT ");

while($matches=mysqli_fetch_array($sql))
{
   $cpt++;
?>

<tr>
	<td><?php echo $cpt; ?></td>
	<td><?php echo $matches['idMatch'] ?></td>
	<td><?php echo $matches['score1'] ?></td>
	<td><?php echo $matches['score2'] ?></td>
	<td><?php echo $matches['_date'] ?></td>
	<td><?php
	$tournoi="SELECT * FROM tournoi WHERE idTournoi=$idT";
	$prendre=$mysqli->query($tournoi);
    $nom=mysqli_fetch_array($prendre);
	echo $nom['nom'] ?></td>
	<td><?php 		
	    $idE=$matches['equipe1'];
		$equipe1="SELECT * FROM equipe WHERE idEquipe=$idE";
		$prend=$mysqli->query($equipe1);
        $nom=mysqli_fetch_array($prend);
		echo $nom['nom']
		?></td>

		<td><?php 		   
		 $idE=$matches['equipe2'];
		 $equipe1="SELECT * FROM equipe WHERE idEquipe=$idE";
		 $prend=$mysqli->query($equipe1);
         $nom=mysqli_fetch_array($prend);
		echo $nom['nom']
		?></td>

		<td><?php
		$idM=$matches['idMatch'];
		$_scoreReq="SELECT score1, score2, equipe1, equipe2
		FROM matches
		WHERE OrganisePar=$idT AND idMatch=$idM";

		$_scoreTab=$mysqli->query($_scoreReq);
		$_gagnant='personne';

		while($_scoreEntree=mysqli_fetch_array($_scoreTab))
		{
		if(($_scoreEntree['score1']-$_scoreEntree['score2']) > 0){
			$_gagnant=$_scoreEntree['equipe1'];
		}
		else if(($_scoreEntree['score1']-$_scoreEntree['score2']) < 0){
			$_gagnant=$_scoreEntree['equipe2'];
		}
		if(empty($_gagnant)){
			echo "Match nul";
		}
		else{ 		
			$equipeG="SELECT * FROM equipe WHERE idEquipe=$_gagnant";
			$prend=$mysqli->query($equipeG);
			$nom=mysqli_fetch_array($prend);
		}
		echo $nom['nom'];
		}?></td>
	<td><a href="RemplirScores.php?idMatch=<?php echo $matches['idMatch'] ?>"><button>Remplissage de Score</button></td>
<?php } ?>
</table>
</div>
</div>

</body>
</html>