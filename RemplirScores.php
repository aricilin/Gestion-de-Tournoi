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
	 $_SESSION['idMatch']=$_GET['idMatch'];
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
    <h1>Score du Match</h1>
    <hr>
    <div align=center class="Inscription">

  <!--Récupération des infos dans le formulaire et appel de la fonction SaisieScore -->
  <form action="SaisieScore.php" method="POST">
	
	<input type="number" required="" name="Score1" placeholder=" Score 1">
	<input type="number" required="" name="Score2" placeholder=" Score 2">
	<button type="submit" name="insertion">Renvoyer</button>

</form>

</div>
</body>
</html>