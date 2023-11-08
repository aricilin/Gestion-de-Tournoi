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
   include "Connect.php";
ob_start();
 session_start();

?>
    
    <div class="co">
      <a class="active" href="Logout.php">Deconnexion</a>  
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

<hr>
<h4>Liste des Joueur</h4>
<hr>
<div align=center >

<table style="width: 60%" border="1">
	
	<tr>
		<th>n° Joueur</th>
		<th>id</th>
		<th>nom</th>
		<th>Prenom</th>
		
    <th>Mail</th>

	</tr>
	<?php
 $idEquipe=$_SESSION['idEquipe'];

$sql=$mysqli->query("SELECT * FROM joueur WHERE EquipeAppartient=$idEquipe");
while($ekipcek=mysqli_fetch_array($sql))
{
   $cpt++;


?>
	<tr>
		<td><?php echo $cpt; ?></td>
		<td><?php echo $ekipcek['idJoueur'] ?></td>
		<td><?php echo $ekipcek['nom'] ?></td>
		<td><?php echo $ekipcek['prenom'] ?></td>
	
		<td><?php echo $ekipcek['mail'] ?></td>
     
<?php } ?>
</table>
</div>
</div>
</body>
</html>