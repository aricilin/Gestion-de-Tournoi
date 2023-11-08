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
  
    <a class="active" href="Logout.php">Déconnexion</a>
  
</div>
  <div class="top">
    <div class='slide1'></div>
    <div class='slide2'></div>
    <div class='slide3'></div>

  </div>

<div class="topnav">
  <a class="active" href="IndexCapitaine.html">Accueil</a>
  <a href="ListeTournoisCap.php">Liste des Tournois</a>
  <a href="MesTournoisCap.php">Mes Tournois</a>
  <a href="MonEquipe.php">Mon Equipe</a>
</div>

<div class="back">
  <h1>Inscription Joueur</h1>
  <hr>
  <div align=center class="Inscription">
  <form method="POST" action="InscriptionJoueurCap.php">

<legend>Inscription Joueur</legend>

<table>
    <tr><td>Prenom: *</td><td><input type="text"required name="Prenom"/></td></tr>
    <tr><td>Nom: *</td><td><input type="text" name="Nom" required/></td></tr>
     <tr><td>Son E-mail: *</td><td><input type="email" name="email" required /></td></tr>
      <tr><td>Son Password: *</td><td><input type="password" name="password" required /></td></tr>

    </td></tr>

  </select>

</table>
<br/>

<input type="submit" value=" Tout envoyer ">
<INPUT TYPE="reset" VALUE=" Recommencer ">
</form>



<hr>
<h4>Liste des Joueur</h4>
<hr>

<table style="width: 60%" border="1">
	
	<tr>
		<th>n° Joueur</th>
		<th>id</th>
		<th>nom</th>
		<th>Prénom</th>
    <th>Mail</th>
		<th width="50">operations</th>
		<th width="50">operations</th>
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
     
	
		<td><a href="ModificationJoueurCap.php?idJoueur=<?php echo $ekipcek['idJoueur'] ?>"><button>Modifier joueur</button></td>
		<td><a href="SupprimeJoueur.php?idJoueur=<?php echo $ekipcek['idJoueur']  ?>&mail=<?php echo $ekipcek['mail']?>"><button>Supprimer joueur</button></td>
<?php } ?>
</table>
</div>
</body>
</html>