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
	<a class="active" href="IndexGestionnaire.html">Accueil</a>
	<a href="ListeTournoiGestionnaire.php">Liste Des Tournois</a>
	<a href="CreerTournoi.php">Créer Tournoi</a>
	<a href="MesTournois.php">Mes Tournois</a>
</div>

<div class="back">
	<div align=center >

	<table style="width: 60%" border="1">
	<tr>
		<th>n° Tournoi</th>
		<th>id</th>
		<th>nom</th>
		<th>dateDebut</th>
		<th>lieu</th>
		<th>nombreEquipes</th>
		<th width="50">operations</th>
		<th width="50">operations</th>
		<th width="50">operations</th>
	</tr>
	
<?php
$id=$_SESSION["id"];
$sql=$mysqli->query("SELECT * FROM tournoi WHERE QuiGere=$id" );


while($tournois=mysqli_fetch_array($sql))
{
   $cpt++;
   $_SESSION['nbEquipes']=$tournois['nombreEquipes'];

?>

<tr>
		<td><?php echo $cpt; ?></td>
		<td><?php echo $tournois['idTournoi'] ?></td>
		<td><?php echo $tournois['nom'] ?></td>
		<td><?php echo $tournois['dateDebut'] ?></td>
		<td><?php echo $tournois['lieu'] ?></td>
		<td><?php echo $tournois['nombreEquipes'] ?></td>
      
		<td><a href="CreerEquipe.php?idTournoi=<?php echo $tournois['idTournoi'] ?>" name="idTournoi" type='number'><button>Modifier Equipes</button></td>
		<td><a href="ArbreDesMatches.php?idTournoi=<?php echo $tournois['idTournoi'] ?>&nbequipes=<?php echo $tournois['nombreEquipes']?>"><button>Voir les matches</button></td>
		<td><a href="generematches.php?idTournoi=<?php echo $tournois['idTournoi'] ?>"><button>Génèrer des matches de Tournoi</button></td>
        

<?php } ?>
</table>
</div>
</body>
</html>
