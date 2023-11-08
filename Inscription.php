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

<div class="co">
  
    <a href="Inscription.php">Inscription</a>
  
  </div>
    <div class="top">

      <div class='slide1'></div>
  <div class='slide2'></div>
  <div class='slide3'></div>

    </div>
  
  <div class="topnav">
  <a class="active" href="Index.html">Accueil</a>
  
    
  </div>

  <div class="back">


<!-- INSCRIPTION FORMULAIRE -->
<div align=center class="Inscription">
<form method="POST" action="Inscrit.php">

<legend>Inscription Gestionnaire</legend>

<table>
    <tr><td>Prénom: *</td><td><input type="text"required name="Prenom"/></td></tr>
    <tr><td>Nom: *</td><td><input type="text" name="Nom" required/></td></tr>
    <tr><td>E-mail: *</td><td><input type="email" name="email" required /></td></tr>
    <tr><td>Password: *</td><td><input type="password" name="password" required /></td></tr>
 
</div> 

</td></tr>
</select>
</table>
<br/>

<!-- Au click, on récupère les informations et appelle la fonction Inscrit-->
<input type="submit" value=" Tout envoyer ">
<INPUT TYPE="reset" VALUE=" Recommencer ">
</form>
</div>
</div>

