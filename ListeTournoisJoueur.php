


<link href="site.css" rel="stylesheet" media="all" type="text/css">
<!doctype html>
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
    <a href="MesInformation.php">Mes Informations</a>
    <a href="MonEquipeJoueur.php">Mon Equipe</a>
  </div>

  <div class="back">

<?php
include 'Connect.php';
?>
<div align=center >
 <table style="width: 60%" border="1">
<tr>
		<th>n° Tournoi</th>
		<th>id</th>
		<th>nom</th>
		<th>dateDebut</th>
		<th>lieu</th>
		<th>nombreEquipes</th>
		<th>Operation</th>

	</tr>
<?php
$sql=$mysqli->query("SELECT * FROM tournoi");


while($turnuvacek=mysqli_fetch_array($sql))
{
   $cpt++;


?>

<tr>
		<td><?php echo $cpt; ?></td>
		<td><?php echo $turnuvacek['idTournoi'] ?></td>
		<td><?php echo $turnuvacek['nom'] ?></td>
		<td><?php echo $turnuvacek['dateDebut'] ?></td>
		<td><?php echo $turnuvacek['lieu'] ?></td>
		<td><?php echo $turnuvacek['nombreEquipes'] ?></td>      
      
    <td><a href="arbreTournoiJoueur.php?nombreEquipes=<?php echo $turnuvacek['nombreEquipes']?>&idTournoi=<?php echo $turnuvacek['idTournoi'] ?>"><button>Arbre de tournoi</button></td>
       
<?php } ?>
</table>
</div>
</div>
</body>
</html>
