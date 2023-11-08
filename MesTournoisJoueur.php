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
	<a class="active" href="IndexJoueur.html">Accueil</a>
	<a href="ListeTournoisJoueur.php">Liste Des Tournois</a>
    <a href="MesTournoisJoueur.php">Mes Tournois</a>
    <a href="MesInformation.php">Mes Information</a>
	<a href="MonEquipeJoueur.php">Mon Equipe</a>
</div>

<div class="back">
	<div align=center >
	<table style="width: 60%" border="1" id="TableMatches">
<tr>
		<th>n° Tournoi</th>
		<th>id</th>
		<th>nom</th>
		<th>dateDébut</th>
		<th>lieu</th>
		<th>nombreEquipes</th>
	</tr>
<?php
$idJoueur=$_SESSION['idJoueur'];
$idEquipe=$_SESSION['idEquipe'];
$sql=$mysqli->query("SELECT * FROM tournoi WHERE idTournoi=(SELECT tournoiContient FROM equipe Where idEquipe=$idEquipe)");
$sqlAjout=$mysqli->query("SELECT * FROM tournoi WHERE idTournoi=(SELECT idTournoi FROM contient Where idEquipe=$idEquipe)");

while($tournois=mysqli_fetch_array($sql))
{
   $cpt++;

?>

<tr>
		<td><?php echo $cpt; ?></td>
      	<td><?php echo $tournois['idTournoi'] ?></td>
		<td><?php echo $tournois['nom'] ?></td>
		<td><?php echo $tournois['dateDebut'] ?></td>
		<td><?php echo $tournois['lieu'] ?></td>
		<td><?php echo $tournois['nombreEquipes'] ?></td>
		<td><a href="ArbreDesMatchesJoueur.php?idTournoi=<?php echo $tournois['idTournoi'] ?>&nbequipes=<?php echo $tournois['nombreEquipes']?>"><button>Voir les matches</button></td>

<?php } ?>

<?php 
while($tournois2=mysqli_fetch_array($sqlAjout))
{
   $cpt++;


?>

<tr>
		<td><?php echo $cpt; ?></td>
      	<td><?php echo $tournois2['idTournoi'] ?></td>
		<td><?php echo $tournois2['nom'] ?></td>
		<td><?php echo $tournois2['dateDebut'] ?></td>
		<td><?php echo $tournois2['lieu'] ?></td>
		<td><?php echo $tournois2['nombreEquipes'] ?></td>
		<td><a href="ArbreDesMatchesJoueur.php?idTournoi=<?php echo $tournois2['idTournoi'] ?>&nbequipes=<?php echo $tournois2['nombreEquipes']?>"><button>Voir les matches</button></td>

<?php } ?>
</table>
</div>
</div>
</body>
</html>
