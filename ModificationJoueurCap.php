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
  include 'connect.php';
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
  <h1>Modification de joueur</h1>
  <hr>
  <form action="ModifierJoueur.php" method="POST">

  <tr><td>Prénom: *</td><td><input type="text"required name="Prenom"/></td></tr>
  <tr><td>Nom: *</td><td><input type="text" name="Nom" required/></td></tr>
  
  <!--<input type="text" required="" name="Capitaine" placeholder=" Capitaine d'Equipe">-->
	<button type="submit" name="insertion">Renvoyer</button>

</form>
</div>
</body>
</html>