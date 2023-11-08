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
	ob_start();
 	session_start();
	$_SESSION['idTournoi']=$_GET['idTournoi'];
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
        <a href="CreerTournoi.php">Créer Tournoi</a>
        <a href="MesTournois.php">Mes Tournois</a>
	</div>

	<div class="back">
		<h1>Inscription d'équipe</h1>
		<hr>
		
		<form action="AjoutEquipe.php" method="POST">
			<input type="text" required="" name="nom" placeholder=" Nom d'Equipe">
			<button type="submit" name="insertion">Renvoyer</button>
		</form>
		<hr>
	<h4>Liste Des Equipes</h4>
	<hr>
	<div align=center >
	<table style="width: 60%" border="1">
	
	<tr>
		<th>n° Equipe</th>
		<th>id</th>
		<th>nom</th>
		<th>niveau</th>
		<th>tournoiContient</th>
		<th width="50">operations</th>
		<th width="50">operations</th>
	</tr>
	<?php
 	$idTournoi=$_SESSION["idTournoi"];
	$sql=$mysqli->query("SELECT * FROM equipe WHERE tournoiContient=$idTournoi");

	while($equipe=mysqli_fetch_array($sql))
	{
	$cpt++;
	?>

	<tr>
		<td><?php echo $cpt; ?></td>
		<td><?php echo $equipe['idEquipe'] ?></td>
		<td><?php echo $equipe['nom'] ?></td>
		<td><?php echo $equipe['niveau'] ?></td>
		
		<td><?php
		
		$tournoi="SELECT * FROM tournoi WHERE idTournoi=$idTournoi";
		$prendre=$mysqli->query($tournoi);
        $nom=mysqli_fetch_array($prendre);
		echo $nom['nom'] ?></td>
		<td><a href="ModificationEquipe.php?idEquipe=<?php echo $equipe['idEquipe'] ?>"><button>Modifier équipe</button></td>
		<td><a href="AjoutJoueur.php?idEquipe=<?php echo $equipe['idEquipe'] ?>"><button>Modifier joueur</button></td>
		<?php } ?>

		</table>
	</div>
</div>
</body>
</html>